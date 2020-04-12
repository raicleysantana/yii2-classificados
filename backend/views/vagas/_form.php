<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Vagas */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="vagas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'vaga_titulo')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'vaga_empresa')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'vaga_contato')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'vaga_status')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'vaga_descricao')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'vaga_arquivo')->fileInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
