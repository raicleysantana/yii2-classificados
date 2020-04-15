<?php

use ramosisw\CImaterial\web\MaterialAsset;
use yii\authclient\widgets\AuthChoice;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model \frontend\modules\user\models\LoginForm */

$this->title = Yii::t('frontend', 'Login');
$this->params['breadcrumbs'][] = $this->title;

$this->registerCssFile('css/form.css', ['depends' => MaterialAsset::className()]);
?>

<div class="site-login">
    <h1 class="text-center"><?php echo Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <div class="panel panel-default">
                <div class="panel-body">

                    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                    <?php echo $form->field($model, 'identity') ?>
                    <?php echo $form->field($model, 'password')->passwordInput() ?>
                    <?php echo $form->field($model, 'rememberMe')->checkbox() ?>

                    <div class="form-group">
                        <?php echo Html::submitButton(Yii::t('frontend', 'Login'), ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
                    </div>

                    <div class="row" style="margin: 15px 0">
                        <div class="col-md-12">
                            <hr class="omb_hrOr">
                            <span class="omb_spanOr">Ou</span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group">
                            <?php $authAuthChoice = AuthChoice::begin([
                                'baseAuthUrl' => ['site/auth'],
                                'autoRender' => false,
                            ]); ?>
                            <div class="col-md-6">
                                <?= Html::a('<i class="fa fa-facebook-f"></i> Entrar com Facebook', [], ['class' => 'btn btn-facebook sharrre btn-block']); ?>
                            </div>
                            <div class="col-md-6">
                                <?= Html::a('<i class="fa fa-google-plus"></i> Entrar com Google', [], ['class' => 'btn btn-google sharrre btn-block']); ?>
                            </div>
                            <?php AuthChoice::end(); ?>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-md-12 text-center">
                            <?php echo Html::a(Yii::t('frontend', 'Need an account? Sign up.'), ['signup']) ?>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 text-center">
                            <div style="color:#999;">
                                <?php echo Yii::t('frontend', 'If you forgot your password you can reset it <a href="{link}">here</a>', [
                                    'link' => Url::to(['sign-in/request-password-reset'])
                                ]) ?>
                                <?php if (Yii::$app->getModule('user')->shouldBeActivated) : ?>
                                    <br>
                                    <?php echo Yii::t('frontend', 'Resend your activation email <a href="{link}">here</a>', [
                                        'link' => Url::to(['sign-in/resend-email'])
                                    ]) ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>


                    <?php ActiveForm::end(); ?>

                </div>
            </div>
        </div>
    </div>
</div>
