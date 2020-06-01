<?php

use yii\db\Migration;

/**
 * Class m200104_045020_vagas
 */
class m200104_045020_vagas extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('vaga', [
            'vaga_id' => 'pk',
            'vaga_titulo' => $this->string(255)->notNull(),
            'vaga_empresa' => $this->string(255),
            'vaga_contato' => $this->string(255),
            'vaga_publicado' => $this->timestamp()->notNull(),
            'vaga_status' => $this->char(1)->notNull(),
            'vaga_descricao' => $this->text(),
            'vaga_arquivo' => $this->string(1000),
            'user_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey('FK_VAGA_USER', 'vaga', 'user_id', 'user', 'id', 'RESTRICT', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('vaga');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200104_045020_vagas cannot be reverted.\n";

        return false;
    }
    */
}
