<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\VagaSearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="vagas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'vaga_id') ?>

    <?php echo $form->field($model, 'vaga_titulo') ?>

    <?php echo $form->field($model, 'vaga_empresa') ?>

    <?php echo $form->field($model, 'vaga_contato') ?>

    <?php echo $form->field($model, 'vaga_publicado') ?>

    <?php // echo $form->field($model, 'vaga_status') ?>

    <?php // echo $form->field($model, 'vaga_descricao') ?>

    <?php // echo $form->field($model, 'vaga_arquivo') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <div class="form-group">
        <?php echo Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
