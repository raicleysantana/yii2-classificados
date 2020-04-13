<?php

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
        <?php echo Html::a('Update', ['update', 'id' => $model->vaga_id], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::a('Delete', ['delete', 'id' => $model->vaga_id], [
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
            'vaga_titulo',
            'vaga_empresa',
            'vaga_contato',
            'vaga_publicado',
            'vaga_status',
            'vaga_descricao:ntext',
            'vaga_arquivo',
            'user_id',
        ],
    ]) ?>

</div>
