<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Vagas */

$this->title = 'Atualizar Vagas: ' . $model->vaga_id;
$this->params['breadcrumbs'][] = ['label' => 'Vagas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->vaga_id, 'url' => ['view', 'id' => $model->vaga_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vagas-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
