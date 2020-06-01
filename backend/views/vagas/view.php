<?php

use common\components\helpers\Date;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Vaga */

$this->title = $model->vaga_id;
$this->params['breadcrumbs'][] = ['label' => 'Vagas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vagas-view">

    <p>
        <?php echo Html::a('Cadastrar novo', ['create', 'id' => $model->vaga_id], ['class' => 'btn btn-success']) ?>
        <?php echo Html::a('Atualizar', ['update', 'id' => $model->vaga_id], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::a('Excluir', ['delete', 'id' => $model->vaga_id], [
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
            'vaga_id',
            ['attribute' => 'user_id', 'label' => 'Postado por', 'value' => $model->user->userProfile->fullName],
            'vaga_titulo',
            'vaga_empresa',
            'vaga_contato',
            ['attribute' => 'vaga_publicado', 'value' => Date::widget([
                'value' => $model->vaga_publicado,
                'format' => 'medium',
            ])],
            ['attribute' => 'vaga_status', 'value' => $model->traducao('vaga_status')],
            'vaga_descricao:ntext',
            ['attribute' => 'vaga_arquivo',
                'value' => function ($model) {
                    return Html::img($model->vaga_base_url . $model->vaga_img_path);
                },
                'format' => 'raw',
            ],

        ],
    ]) ?>

</div>
