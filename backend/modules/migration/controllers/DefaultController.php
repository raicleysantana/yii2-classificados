<?php

namespace backend\modules\migration\controllers;

use yii\web\Controller;

use backend\modules\migration\components\MigrationManager;

use yii\data\ArrayDataProvider;

/**
 * Default controller for the `migration` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */


    public function actionIndex()
    {
        $this->layout = (\Yii::$app->user->isGuest) ? 
            'base' : '@backend/views/layouts/common';

        //$migrations = $this->getNewMigrations();
        $data = array();



        // Adiciona as novas Migrations
        $new = MigrationManager::getNewMigrations();

        krsort($new);

        foreach($new as $name){
            $data[] = array('name' => $name, 'nova' => true, 'atual' => false);
        }




        // Adiciona as Migrations Executadas
        $migrations = MigrationManager::getMigrationHistory(null);

        $atual = false;



        foreach($migrations as $name => $time){

            $migration = array('name' => $name, 'time' => $time, 'atual' => false);

            if(!$atual){
                $atual = true;
                $migration['atual'] = true;
            }
            $data[] = $migration;
        }


        $provider = new ArrayDataProvider([
            'allModels' => $data,
            'pagination' => [
                'pageSize' => 20,
            ],
            'sort' => [
                'attributes' => ['id', 'name'],
            ],
        ]);



        return $this->render('index', ['provider' => $provider]);
    }


    public function actionMarcar($version){

        MigrationManager::mark($version);

        return $this->redirect(\Yii::$app->request->referrer ?: Yii::$app->homeUrl);

        //$this->redirect('index');
    }


    public function actionUp($version){

        if(MigrationManager::migrateUp($version)){
            //$this->redirect('index');

            return $this->redirect(\Yii::$app->request->referrer ?: Yii::$app->homeUrl);
        }

    }

    public function actionDown($version){

        if(MigrationManager::migrateDown($version)){
            //$this->redirect('index');

            return $this->redirect(\Yii::$app->request->referrer ?: Yii::$app->homeUrl);
        }

    }
}
