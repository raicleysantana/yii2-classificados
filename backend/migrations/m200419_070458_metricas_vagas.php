<?php

use yii\db\Migration;

/**
 * Class m200419_070458_metricas_vagas
 */
class m200419_070458_metricas_vagas extends Migration
{
    public $table = "metrica_por_vaga";

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable($this->table, [
            'mp_id' => 'pk',
            'ip' => $this->string(32),
            'data' => $this->dateTime()->notNull(),
            'vaga_id' => $this->integer()->notNull(),
            'user_post' => $this->integer(),
            'navegador' => $this->string(30),
            'plataforma' => $this->string(30),
            'os' => $this->string(30),
        ]);

        $this->addForeignKey('METRICA_V_VAGA', $this->table, 'vaga_id', 'vaga', 'vaga_id');
        $this->addForeignKey('METRICA_V_USER_POST', $this->table, 'user_post', 'user', 'id');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('metrica_por_vaga');
    }
}
