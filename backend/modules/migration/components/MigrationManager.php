<?php

namespace backend\modules\migration\components;

use Yii;
use yii\console\controllers\BaseMigrateController;
use yii\db\Connection;
use yii\db\Query;
use yii\di\Instance;
use yii\helpers\ArrayHelper;
use yii\helpers\Console;
use yii\console\ExitCode;


class MigrationManager
{

    public static $db;

    const BASE_MIGRATION = 'm000000_000000_base';

    public static $migrationNamespaces = [];

    public static $migrationTable = 'system_db_migration';

    public static $migrationPath = ['@backend/migrations'];

    const MAX_NAME_LENGTH = 180;

    public static function getDb(){
        self::$db = Instance::ensure('db', Connection::className());

        return self::$db;
    }


    public function getMigrationHistory($limit)
    {
        if (self::getDb()->schema->getTableSchema(self::$migrationTable, true) === null) {
            self::createMigrationHistoryTable();
        }


        $query = (new Query())
            ->select(['version', 'apply_time'])
            ->from(self::$migrationTable)
            ->orderBy(['apply_time' => SORT_DESC, 'version' => SORT_DESC]);

        if (empty(self::$migrationNamespaces)) {
            $query->limit($limit);
            $rows = $query->all(self::getDb());

            $history = ArrayHelper::map($rows, 'version', 'apply_time');
            unset($history[self::BASE_MIGRATION]);
            return $history;
        }

        $rows = $query->all(self::getDb());


        $history = [];
        foreach ($rows as $key => $row) {
            if ($row['version'] === self::BASE_MIGRATION) {
                continue;
            }
            if (preg_match('/m?(\d{6}_?\d{6})(\D.*)?$/is', $row['version'], $matches)) {
                $time = str_replace('_', '', $matches[1]);
                $row['canonicalVersion'] = $time;
            } else {
                $row['canonicalVersion'] = $row['version'];
            }
            $row['apply_time'] = (int) $row['apply_time'];
            $history[] = $row;
        }

        usort($history, function ($a, $b) {
            if ($a['apply_time'] === $b['apply_time']) {
                if (($compareResult = strcasecmp($b['canonicalVersion'], $a['canonicalVersion'])) !== 0) {
                    return $compareResult;
                }

                return strcasecmp($b['version'], $a['version']);
            }

            return ($a['apply_time'] > $b['apply_time']) ? -1 : +1;
        });

        $history = array_slice($history, 0, $limit);

        $history = ArrayHelper::map($history, 'version', 'apply_time');

        return $history;
    }

    public function createMigrationHistoryTable()
    {
        $tableName = self::getDb()->schema->getRawTableName(self::$migrationTable);

        //die('teste');
        echo "Creating migration history table \"$tableName\"...";

        self::getDb()->createCommand()->createTable(self::$migrationTable, [
            'version' => 'varchar(' . static::MAX_NAME_LENGTH . ') NOT NULL PRIMARY KEY',
            'apply_time' => 'integer',
        ])->execute();
        self::getDb()->createCommand()->insert(self::$migrationTable, [
            'version' => self::BASE_MIGRATION,
            'apply_time' => time(),
        ])->execute();

        echo ("Done.\n");
    }




    public function getNewMigrations()
    {
        $applied = [];
        foreach (self::getMigrationHistory(null) as $class => $time) {
            $applied[trim($class, '\\')] = true;
        }

        $migrationPaths = [];
        if (is_array(self::$migrationPath)) {
            foreach (self::$migrationPath as $path) {
                $migrationPaths[] = [Yii::getAlias($path), ''];
            }
        } elseif (!empty(self::$migrationPath)) {
            $migrationPaths[] = [Yii::getAlias(self::$migrationPath), ''];
        }
        foreach (self::$migrationNamespaces as $namespace) {
            $migrationPaths[] = [self::getNamespacePath($namespace), $namespace];
        }


        $migrations = [];
        foreach ($migrationPaths as $item) {
            list($migrationPath, $namespace) = $item;


            if (!file_exists($migrationPath)) {
                continue;
            }
            $handle = opendir($migrationPath);

            while (($file = readdir($handle)) !== false) {
                if ($file === '.' || $file === '..') {
                    continue;
                }
                $path = $migrationPath . DIRECTORY_SEPARATOR . $file;

                if (preg_match('/^(m(\d{6}_?\d{6})\D.*?)\.php$/is', $file, $matches) && is_file($path)) {
                    $class = $matches[1];
                    if (!empty($namespace)) {
                        $class = $namespace . '\\' . $class;
                    }
                    $time = str_replace('_', '', $matches[2]);
                    if (!isset($applied[$class])) {
                        $migrations[$time . '\\' . $class] = $class;
                    }
                }
            }
            closedir($handle);
        }

        ksort($migrations);

        return array_values($migrations);
    }


    public function mark($version)
    {
        $originalVersion = $version;
        if (($namespaceVersion = self::extractNamespaceMigrationVersion($version)) !== false) {
            $version = $namespaceVersion;
        } elseif (($migrationName = self::extractMigrationVersion($version)) !== false) {
            $version = $migrationName;
        } elseif ($version !== static::BASE_MIGRATION) {
            throw new Exception("The version argument must be either a timestamp (e.g. 101129_185401)\nor the full name of a migration (e.g. m101129_185401_create_user_table)\nor the full name of a namespaced migration (e.g. app\\migrations\\M101129185401CreateUserTable).");
        }

        // try mark up
        $migrations = self::getNewMigrations();
        foreach ($migrations as $i => $migration) {
            if (strpos($migration, $version) === 0) {
                //if ($this->confirm("Set migration history at $originalVersion?")) {
                    for ($j = 0; $j <= $i; ++$j) {
                        self::addMigrationHistory($migrations[$j]);
                    }
                    //$this->stdout("The migration history is set at $originalVersion.\nNo actual migration was performed.\n", Console::FG_GREEN);
                //}

                return ExitCode::OK;
            }
        }

        // try mark down
        $migrations = array_keys(self::getMigrationHistory(null));
        $migrations[] = static::BASE_MIGRATION;
        foreach ($migrations as $i => $migration) {
            if (strpos($migration, $version) === 0) {
                if ($i === 0) {
                    //$this->stdout("Already at '$originalVersion'. Nothing needs to be done.\n", Console::FG_YELLOW);
                } else {
                    //if ($this->confirm("Set migration history at $originalVersion?")) {
                        for ($j = 0; $j < $i; ++$j) {
                            self::removeMigrationHistory($migrations[$j]);
                        }
                        //$this->stdout("The migration history is set at $originalVersion.\nNo actual migration was performed.\n", Console::FG_GREEN);
                    }
                //}

                return ExitCode::OK;
            }
        }

        throw new Exception("Unable to find the version '$originalVersion'.");
    }


    private function extractNamespaceMigrationVersion($rawVersion)
    {
        if (preg_match('/^\\\\?([\w_]+\\\\)+m(\d{6}_?\d{6})(\D.*)?$/is', $rawVersion, $matches)) {
            return trim($rawVersion, '\\');
        }

        return false;
    }

    private function extractMigrationVersion($rawVersion)
    {
        if (preg_match('/^m?(\d{6}_?\d{6})(\D.*)?$/is', $rawVersion, $matches)) {
            return 'm' . $matches[1];
        }

        return false;
    }


    protected function removeMigrationHistory($version)
    {
        $command = self::getDb()->createCommand();
        $command->delete(self::$migrationTable, [
            'version' => $version,
        ])->execute();
    }


    protected function addMigrationHistory($version)
    {
        $command = self::getDb()->createCommand();
        $command->insert(self::$migrationTable, [
            'version' => $version,
            'apply_time' => time(),
        ])->execute();
    }

    public function migrateUp($class)
    {
        if ($class === self::BASE_MIGRATION) {
            return true;
        }

        $start = microtime(true);
        $migration = self::createMigration($class);

        if ($migration->up() !== false) {
            self::addMigrationHistory($class);

            $time = microtime(true) - $start;

            return true;
        }

        $time = microtime(true) - $start;

        return false;
    }


    public function migrateDown($class)
    {
        if ($class === self::BASE_MIGRATION) {
            return true;
        }

        $migration = self::createMigration($class);

        if ($migration->down() !== false) {
            self::removeMigrationHistory($class);

            return true;
        }



        return false;
    }


    protected function includeMigrationFile($class)
    {

        $class = trim($class, '\\');
        if (strpos($class, '\\') === false) {
            if (is_array(self::$migrationPath)) {
                foreach (self::$migrationPath as $path) {
                    $file = Yii::getAlias($path) . DIRECTORY_SEPARATOR . $class . '.php';

                    if (is_file($file)) {
                        require_once $file;
                        break;
                    }
                }
            } else {
                $file = self::$migrationPath . DIRECTORY_SEPARATOR . $class . '.php';
                require_once $file;
            }
        }
    }


    protected function createMigration($class)
    {
        self::includeMigrationFile($class);

        $migration = Yii::createObject($class);
        if ($migration instanceof BaseObject && $migration->canSetProperty('compact')) {
            $migration->compact = false;
        }

        return $migration;
    }

}
