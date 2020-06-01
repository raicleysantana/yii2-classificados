<?php

use common\components\helpers\Date;
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Vaga */

$this->title = $model->vaga_id;
$this->params['breadcrumbs'][] = ['label' => 'Vagas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="vagas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->vaga_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->vaga_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            ['attribute' => 'vaga_id', 'label' => 'ID', 'value' => $model->vaga_id],
            'vaga_titulo',
            'vaga_empresa',
            'vaga_contato',
            ['attribute' => 'vaga_publicado', 'value' => Yii::$app->formatter->asDate($model->vaga_publicado, 'dd-MM-Y hh:mm:s')],
            'vaga_status',
            'vaga_descricao:ntext',
            'vaga_arquivo',
        ],
    ]) ?>

</div>
