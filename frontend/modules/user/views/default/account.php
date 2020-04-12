<?php

use common\models\UserProfile;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\base\MultiModel */
/* @var $form yii\widgets\ActiveForm */

$this->title = 'Configurações do usuário';
?>

<div class="col-md-8">
    <div class="card">
        <div class="card-header" data-background-color="purple">
            <h4 class="title">Editar informações</h4>
            <p class="category">Completa suas informações</p>
        </div>
        <div class="card-content">
            <?php $form = ActiveForm::begin(); ?>
            <?php echo $form->field($model->getModel('profile'), 'firstname', [
                'options' => ['class' => 'bmd-form-group form-group']
            ])->textInput(['maxlength' => 255]) ?>

            <?php echo $form->field($model->getModel('profile'), 'lastname')->textInput(['maxlength' => 255]) ?>

            <div class="row">
                <div class="col-md-4">

                    <?php echo $form->field($model->getModel('profile'), 'gender')->dropDownlist(UserProfile::getSexoOptions(), ['prompt' => '']);
                    ?>
                </div>
            </div>


            <h3><b>Configurações da Conta</b></h3>

            <?php echo $form->field($model->getModel('account'), 'username') ?>
            <?php echo $form->field($model->getModel('account'), 'email') ?>
            <?php echo $form->field($model->getModel('account'), 'password')->passwordInput() ?>
            <?php echo $form->field($model->getModel('account'), 'password_confirm')->passwordInput() ?>


            <div class="form-group">
                <?php echo Html::submitButton('Atualizar', ['class' => 'btn btn-primary']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
