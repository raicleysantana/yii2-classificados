<?php

use kartik\file\FileInput;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\helpers\Url;
use yii\web\JsExpression;
use yii\widgets\MaskedInput;

/* @var $this yii\web\View */
/* @var $model common\models\Curso */
/* @var $form yii\bootstrap\ActiveForm */

?>

<div class="curso-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'cur_nome')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'cur_preco')->widget(MaskedInput::className(), [
        'clientOptions' => [
            'alias' => 'decimal',
            'digits' => 2,
            'digitsOptional' => false,
            'radixPoint' => ',',
            'groupSeparator' => '.',
            'autoGroup' => true,
            'removeMaskOnSubmit' => true,
        ],
    ]) ?>

    <?php echo $form->field($model, 'cur_descricao')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'cur_formato')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'cur_url_paginavenda')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'cur_url_checkout')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'file')->widget(FileInput::className(), [
        'options' => ['accept' => 'image/*'],
        'language' => 'pt',
        'pluginOptions' => [
            'initialPreview' => [
                $model->file,
            ],
            'initialPreviewAsData' => true,
            'initialPreviewShowDelete' => true,
            'showCaption' => false,
            'showRemove' => false,
            'showUpload' => false,

            'browseClass' => 'btn btn-primary btn-block',
            'browseIcon' => '<i class="glyphicon glyphicon-camera"></i> ',
            'browseLabel' => 'Selecionar Imagem',
            'deleteUrl' => Url::to(['/curso/file-delete', 'id' => $model->cur_id]),
        ],
    ]) ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? 'Criar' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
