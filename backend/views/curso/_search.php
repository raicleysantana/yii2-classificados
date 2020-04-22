<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\CursoSearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="curso-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'cur_id') ?>

    <?php echo $form->field($model, 'cur_nome') ?>

    <?php echo $form->field($model, 'cur_preco') ?>

    <?php echo $form->field($model, 'cur_imagem') ?>

    <?php echo $form->field($model, 'cur_descricao') ?>

    <?php // echo $form->field($model, 'cur_formato') ?>

    <?php // echo $form->field($model, 'cur_link') ?>

    <div class="form-group">
        <?php echo Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
