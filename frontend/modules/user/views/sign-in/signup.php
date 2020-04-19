<?php

use ramosisw\CImaterial\web\MaterialAsset;
use yii\authclient\widgets\AuthChoice;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model \frontend\modules\user\models\SignupForm */

$this->title = 'Criar Conta';
$this->params['breadcrumbs'][] = $this->title;

$this->registerCssFile('css/form.css', ['depends' => MaterialAsset::className()]);
?>


<div class="site-signup">
    <h1 class="text-center"><?php echo Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <div class="panel panel-default">
                <div class="panel-body">
                    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
                    <?php echo $form->field($model, 'username') ?>
                    <?php echo $form->field($model, 'email') ?>
                    <?php echo $form->field($model, 'password')->passwordInput() ?>
                    <?php echo $form->field($model, 'password_confirm')->passwordInput() ?>
                    <div class="form-group">
                        <?php echo Html::submitButton(Yii::t('frontend', 'Signup'), ['class' => 'btn btn-primary btn-block', 'name' => 'signup-button']) ?>
                    </div>

                    <div class="row" style="margin: 15px 0">
                        <div class="col-md-12">
                            <hr class="omb_hrOr">
                            <span class="omb_spanOr">Ou</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <?php $authAuthChoice = AuthChoice::begin([
                            'baseAuthUrl' => ['site/auth'],
                            'autoRender' => false,
                        ]); ?>
                        <div class="row">
                            <div class="col-md-6">
                                <?= Html::a('<i class="fa fa-facebook-f"></i> Registrar com Facebook', ['/user/sign-in/auth', 'authclient' => 'facebook'],
                                    ['class' => 'btn btn-facebook btn-block auth-link',
                                        'data-popup-width' => 960,
                                        'data-popup-height' => 580,
                                    ]); ?>
                            </div>
                            <div class="col-md-6">
                                <?= Html::a('<i class="fa fa-google-plus"></i> Registrar com Google', ['/user/sign-in/auth', 'authclient' => 'google'], ['class' => 'btn btn-google sharrre btn-block']); ?>
                            </div>
                        </div>
                        <?php AuthChoice::end(); ?>
                    </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
