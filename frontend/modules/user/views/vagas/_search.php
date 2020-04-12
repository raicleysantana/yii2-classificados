<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\user\models\search\vagasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vagas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'vaga_id') ?>

    <?= $form->field($model, 'vaga_titulo') ?>

    <?= $form->field($model, 'vaga_empresa') ?>

    <?= $form->field($model, 'vaga_contato') ?>

    <?= $form->field($model, 'vaga_publicado') ?>

    <?php // echo $form->field($model, 'vaga_status') ?>

    <?php // echo $form->field($model, 'vaga_descricao') ?>

    <?php // echo $form->field($model, 'vaga_arquivo') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
