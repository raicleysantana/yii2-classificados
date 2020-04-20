<?php

namespace common\components\metricas;

use common\models\Vaga;
use Yii;
use common\models\MetricaPorVaga;

class MetricaVaga extends MetricaPorVaga
{
    public static function insertMetrica($id)
    {
        $userAgent = Yii::$app->userAgent;
        $vaga = Vaga::findOne($id);

        $model = new MetricaPorVaga();

        $model->vaga_id = $vaga->vaga_id;
        $model->ip = Yii::$app->request->getUserIP();
        $model->data = date('Y-m-d H:i:s');
        $model->user_post = $vaga->user_id;
        $model->os = $userAgent->os;
        $model->plataforma = $userAgent->platform;
        $model->navegador = $userAgent->browser;
        $model->save(false);
    }

    public static function visualizacao($user_id, $diaria = false)
    {

        $query = self::find()->where(['user_post' => $user_id]);
        if ($diaria) {
            $data_atual = date('Y-m-d');
            $query->andWhere(['=', "DATE_FORMAT(data,'%Y-%m-%d')", $data_atual]);
        }
        $count = $query->count();

        return $count;
    }
}