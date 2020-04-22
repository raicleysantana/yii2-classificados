<?php

namespace common\components\helpers;

use Yii;

class NumberHelper
{

    public static function decimal($value)
    {
        return Yii::$app->formatter->asDecimal($value, 2);
    }

    public static function parse($value)
    {
        $value = str_replace(".", "", $value);
        $value = str_replace(",", ".", $value);
        return $value;
    }

    public static function asPreco($value, $decimal = 2)
    {
        if ($value)
            return 'R$ ' . Yii::$app->formatter->asDecimal($value, $decimal);
        else
            return 'GRÁTIS';
    }
}