<?php

use trntv\filekit\widget\Upload;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $model common\models\Vaga */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="vagas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'vaga_titulo')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'vaga_empresa')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'vaga_contato')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'vaga_status')->dropDownList($model->getSituacaoOptions(),['maxlength' => true]) ?>

    <?php echo $form->field($model, 'vaga_descricao')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'file')->widget(Upload::class,[
            'url' => ['avatar-upload'],
            'acceptFileTypes' => new JsExpression('/(\.|\/)(gif|jpe?g|png)$/i'),
    ]);
    ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? 'Cadastrar' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
