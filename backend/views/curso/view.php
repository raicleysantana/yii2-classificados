<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Curso */

$this->title = $model->cur_id;
$this->params['breadcrumbs'][] = ['label' => 'Cursos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="curso-view">

    <p>
        <?php echo Html::a('Atualizar', ['update', 'id' => $model->cur_id], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::a('Excluir', ['delete', 'id' => $model->cur_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'cur_id',
            'cur_nome',
            'cur_preco',
            'cur_imagem',
            'cur_descricao:ntext',
            'cur_formato',
            'cur_url_paginavenda',
            'cur_url_checkout',
        ],
    ]) ?>

</div>
