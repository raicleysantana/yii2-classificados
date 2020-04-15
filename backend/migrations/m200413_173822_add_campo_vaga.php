<?php

use yii\db\Migration;

/**
 * Class m200413_173822_add_campo_vaga
 */
class m200413_173822_add_campo_vaga extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('vaga', 'vaga_qtde_curtida', $this->integer()->defaultValue(0));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('vaga', 'vaga_qtde_curtida');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200413_173822_add_campo_vaga cannot be reverted.\n";

        return false;
    }
    */
}
