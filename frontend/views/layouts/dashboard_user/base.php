<?php

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

/* @var $this View */
/* @var $content string */

$this->beginContent('@frontend/views/layouts/dashboard_user/_clear.php')
?>

    <div class="wrapper">

        <div class="sidebar" data-color="blue">
            <!--
                Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

                Tip 2: you can also add an image using data-image tag
            -->

            <div class="logo">
                <a href="<?= Url::to(['/user']) ?>" class="simple-text">
                    Classificados
                </a>
            </div>

            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li>
                        <a href="<?= Url::to(['/user']) ?>">
                            <i class="material-icons">dashboard</i>
                            <p>Painel de Administrativo</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?= Url::to(['/user/default/account']) ?>">
                            <i class="material-icons">person</i>
                            <p>Minha conta</p>
                        </a>
                    <li>
                        <a href="<?= Url::to(['/user/vagas']) ?>">
                            <i class="material-icons">card_travel</i>
                            <p>Minhas Vagas</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="main-panel">
            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                    </div>
                    <div class="collapse navbar-collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">notifications</i>
                                    <span class="notification">5</span>
                                    <p class="hidden-lg hidden-md">Notifications</p>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Mike John responded to your email</a></li>
                                    <li><a href="#">You have 5 new tasks</a></li>
                                    <li><a href="#">You're now friend with Andrew</a></li>
                                    <li><a href="#">Another Notification</a></li>
                                    <li><a href="#">Another One</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="material-icons">person</i>
                                    <b><?= Yii::$app->user->identity->username; ?></b>
                                    <p class="hidden-lg hidden-md">Profile</p>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a href="<?= Url::to('/user/default/account') ?>">Minha Conta</a></li>
                                    <li><a href="<?= Url::to('/user/settings') ?>">Configuração</a></li>
                                    <li class="dropdown-divider"></li>
                                    <li><a data-method="post" href="<?= Url::to('/user/sign-in/logout') ?>">Sair</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <?php echo $content ?>
                    </div>
                </div>
            </div>

            <footer class="footer">
                <div class="container-fluid">
                    <nav class="pull-left">
                        <ul>
                            <li>
                                <a href="#">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Company
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Portfolio
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Blog
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <p class="copyright pull-right">
                        &copy;
                        <script>document.write(new Date().getFullYear())</script>
                        <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                    </p>
                </div>
            </footer>
        </div>
    </div>

<?php
$js = <<< JS
 $(document).ready(function () {
            // Javascript method's body can be found in assets/js/demos.js
            demo.initDashboardPageCharts();
        });
JS;
$this->registerJs($js, View::POS_END);
?>

<?php
$js = <<< JS
$(document).ready(function () {
    
            var url = window.location;
            
           $('ul.nav a').filter(function() {
                    return this.href == url;
          })
          .parent().addClass('active');
        });
JS;
$this->registerJs($js, View::POS_END);
?>

<?php $this->endContent() ?>