<?php

use yii\db\Migration;

/**
 * Class m200413_030510_create_tb_curtidas
 */
class m200413_030510_create_tb_curtidas extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('curtida', [
            'cur_id' => 'pk',
            'user_id' => $this->integer(),
            'ip' => $this->string(30),
            'vaga_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey('FK_CURTIDA_USUARIO', 'curtida', 'user_id', 'user', 'id');
        $this->addForeignKey('FK_CURTIDA_VAGA', 'curtida', 'vaga_id', 'vaga', 'vaga_id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('curtida');

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200413_030510_create_tb_curtidas cannot be reverted.\n";

        return false;
    }
    */
}
