<?php

use yii\db\Migration;

/**
 * Class m200420_195732_cursos
 */
class m200420_195732_cursos extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('curso', [
            'cur_id' => 'pk',
            'cur_nome' => $this->string(80)->notNull(),
            'cur_preco' => $this->decimal(12, 2),
            'cur_base_url' => $this->string(255),
            'cur_imagem' => $this->string(500),
            'cur_descricao' => $this->text(),
            'cur_formato' => $this->string(300),
            'cur_url_paginavenda' => $this->string(1000)->notNull(),
            'cur_url_checkout' => $this->string(1000)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('curso');
    }
}
