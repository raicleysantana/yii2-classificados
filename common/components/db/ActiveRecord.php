<?php


namespace common\components\db;


class ActiveRecord extends \yii\db\ActiveRecord
{
    protected $traducoes = [];

    public function traducao($campo)
    {
        $funcao = $this->traducoes[$campo];
        $options = static::$funcao();

        return $options[$this->$campo];
    }
}