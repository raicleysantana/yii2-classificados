<?php

use common\components\helpers\NumberHelper;
use yii\helpers\Html;
use yii\helpers\StringHelper;
use yii\helpers\Url;

/* @var \yii\web\View */
?>


<div class="col-xs-12 col-sm-4">
    <div class="card">
        <a class="img-card" href="<?= Url::to((['/site/view_curso', 'id' => $model->cur_id])) ?>">
            <?= Html::img($model->imagem, ['class' => 'img-responsive', 'style' => 'width:100%']) ?>
        </a>
        <div class="card-content">
            <!--<h4 class="card-title">
                <a href="javascript:;">
                    Nombre del color
                </a>
            </h4>-->
            <p class="text-center">
                <b><?= mb_strtoupper($model->cur_nome) ?></b>
            </p>
            <p style="font-size: 10pt;color: #666">
                <?= StringHelper::truncateWords($model->cur_descricao, 40, ' ...'); ?>
            </p>
            <div class="row">
                <div class="col-sm-12">
                    <p style="color: green;font-size: 17pt" class="pull-right">
                        <b><?= 'R$ ' . NumberHelper::decimal($model->cur_preco); ?></b>
                    </p>
                </div>
            </div>

        </div>
    </div>
</div>