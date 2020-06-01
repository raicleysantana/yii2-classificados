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
        $this->addColumn('vaga', 'vaga_base_url', $this->string(300));
        $this->addColumn('vaga', 'vaga_img_path', $this->string(300));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('vaga', 'vaga_base_url');
        $this->dropColumn('vaga', 'vaga_img_path');
    }
}
