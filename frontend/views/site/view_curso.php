<?php
/* @var  \yii\web\View */

$this->title = $model->cur_nome;

use common\components\helpers\NumberHelper;
use yii\helpers\Html; ?>

<style>
    h1 {
        font-size: 27pt;
    }

    .text-descricao {
        color: #666;
    }

    .content-image {
        justify-content: center;
        display: flex;
    }
</style>

<div class="container">
    <div class="col-sm-8 col-sm-offset-2">
        <div class="panel panel-default">
            <div class="panel-body">
                <h1 class="text-center"><b><?= mb_strtoupper($model->cur_nome); ?></b></h1>
                <br>
                <div class="container-fluid content-image">
                    <?= Html::img($model->imagem, ['class' => 'img-responsive']); ?>
                </div>
                <br>
                <div class="text-descricao">
                    <?= $model->cur_descricao; ?>
                </div>
                <br>
                <div>
                    <b>Formato: </b><?= $model->cur_formato; ?>
                </div>
                <div class="text-center">
                    <h3 style="color: green;font-weight: bold">
                        <?= NumberHelper::asPreco($model->cur_preco); ?>
                    </h3>
                </div>

                <?= Html::a('Ver mais detalhes', $model->cur_url_paginavenda, ['class' => 'btn btn-info btn-block']); ?>
                <?= Html::a('Ir para Pagina de pagamento', $model->cur_url_checkout, ['class' => 'btn btn-success btn-block']); ?>
            </div>
        </div>
    </div>
</div>