<?php

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

/* @var $this \yii\web\View */
/* @var $content string */

$this->beginContent('@frontend/views/layouts/_clear.php')
?>
    <div class="wrap">
        <?php
        NavBar::begin([
            'brandLabel' => '<div class="text-xs-center">' . Yii::$app->name . '</div>',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar navbar-inverse navbar-fixed-top',
            ],
        ]); ?>
        <?php echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
                ['label' => 'Inicio', 'url' => ['/site/index']],
                ['label' => 'Cursos Recomendados', 'url' => ['/site/cursos_recomendados']],

                /*       ['label' => 'Entrar', 'url' => ['/user/sign-in/login'], 'visible' => Yii::$app->user->isGuest],
                       ['label' => 'Anunciar vaga', 'url' => ['/user/sign-in/signup'], 'visible' => Yii::$app->user->isGuest],*/
                /* [
                     'label' => Yii::$app->user->isGuest ? '' : Yii::$app->user->identity->getPublicIdentity(),
                     'visible' => !Yii::$app->user->isGuest,
                     'items' => [
                         [
                             'label' => 'Painel Administrativo',
                             'url' => ['/user'],
                         ],
                         [
                             'label' => 'Minha Conta',
                             'url' => ['/user/default/account']
                         ],
                         [
                             'label' => Yii::t('frontend', 'Sair'),
                             'url' => ['/user/sign-in/logout'],
                             'linkOptions' => ['data-method' => 'post']
                         ]
                     ]
                 ],*/
            ]
        ]); ?>
        <?php NavBar::end(); ?>

        <div style="margin-top: 80px">
            <?php echo $content ?>
        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <p class="pull-left">&copy; Classficados <?php echo date('Y') ?></p>
            <p class="pull-right"><?php //echo Yii::powered() ?></p>
        </div>
    </footer>
<?php $this->endContent() ?>