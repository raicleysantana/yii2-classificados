<?php

use ramosisw\CImaterial\web\MaterialAsset;
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */

if (class_exists('ramosisw\CImaterial\web\MaterialAsset')) {
    MaterialAsset::register($this);
}
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?php echo Yii::$app->language ?>">
<head>
    <meta charset="<?php echo Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"
    <!-- Chrome, Firefox OS and Opera -->
    <meta name="theme-color" content="#9c27b0">
    <!-- Windows Phone -->
    <meta name="msapplication-navbutton-color" content="#9c27b0">
    <!-- iOS Safari -->
    <meta name="apple-mobile-web-app-status-bar-style" content="#9c27b0">

    <title><?php echo Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <?php echo Html::csrfMetaTags() ?>
</head>
<body>
<?php $this->beginBody() ?>
<?php echo $content ?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
