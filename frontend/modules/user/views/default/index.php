<?php

use common\components\metricas\MetricaVaga;
use common\models\Curtida;
use common\models\Vaga;
use trntv\filekit\widget\Upload;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\base\MultiModel */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Bem vindo ' . Yii::$app->user->getIdentity()->username;
?>


<div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats">
        <div class="card-header" data-background-color="green">
            <i class="fa fa-eye" aria-hidden="true"></i>
        </div>
        <div class="card-content">
            <p class="category">Visualizações</p>
            <h3 class="title"><?= MetricaVaga::visualizacao(Yii::$app->user->identity->id, true) ?></h3>
        </div>
        <div class="card-footer">
            <div class="stats">
                <i class="material-icons">date_range</i> Nas ultimas 24 Horas
            </div>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats">
        <div class="card-header" data-background-color="red">
            <i class="fa fa-eye" aria-hidden="true"></i>
        </div>
        <div class="card-content">
            <p class="category">Visualizações</p>
            <h3 class="title"><?= MetricaVaga::visualizacao(Yii::$app->user->identity->id) ?></h3>
        </div>
        <div class="card-footer">
            <div class="stats">
                <i class="material-icons">date_range</i> Total
            </div>
        </div>
    </div>
</div>

<div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats">
        <div class="card-header" data-background-color="blue">
            <i class="material-icons">card_travel</i>
        </div>
        <div class="card-content">
            <p class="category">Vagas</p>
            <h3 class="title"><?= Vaga::find()->where(['user_id' => Yii::$app->user->identity->id])->count() ?></h3>
        </div>
        <div class="card-footer">
            <div class="stats">
                <i class="material-icons">card_travel</i> Publicadas
            </div>
        </div>
    </div>
</div>

