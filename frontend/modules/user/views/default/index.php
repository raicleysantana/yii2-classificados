<?php

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
            <i class="material-icons">store</i>
        </div>
        <div class="card-content">
            <p class="category">Visualizações</p>
            <h3 class="title">0</h3>
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
            <i class="material-icons">info_outline</i>
        </div>
        <div class="card-content">
            <p class="category">Visualizações</p>
            <h3 class="title">0</h3>
        </div>
        <div class="card-footer">
            <div class="stats">
                <i class="material-icons">local_offer</i> Total
            </div>
        </div>
    </div>
</div>

<div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats">
        <div class="card-header" data-background-color="blue">
            <i class="fa fa-twitter"></i>
        </div>
        <div class="card-content">
            <p class="category">Followers</p>
            <h3 class="title">+245</h3>
        </div>
        <div class="card-footer">
            <div class="stats">
                <i class="material-icons">update</i> Just Updated
            </div>
        </div>
    </div>
</div>
