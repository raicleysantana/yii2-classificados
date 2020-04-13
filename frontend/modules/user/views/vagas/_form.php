<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Vaga */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vagas-form">

    <div class="col-md-8">
        <div class="card">
            <div class="card-header" data-background-color="purple">
                <h4 class="card-title"><?= Html::encode($this->title); ?></h4>
            </div>
            <div class="card-content">
                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'vaga_titulo')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'vaga_contato')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'vaga_empresa')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'vaga_descricao')->textarea(['rows' => 8]) ?>

                <?= $form->field($model, 'vaga_arquivo')->fileInput() ?>

                <div class="row">
                    <div class="col-md-3">
                        <?= $form->field($model, 'vaga_status')->dropDownList($model->getSituacaoOptions(), ['maxlength' => true, 'prompt' => '(Selecione)']) ?>
                    </div>
                </div>


                <div class="form-group">
                    <?= Html::submitButton('Salvar', ['class' => 'btn btn-success']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>

</div>
