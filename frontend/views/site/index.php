<?php
/* @var $this yii\web\View */

use ramosisw\CImaterial\web\MaterialAsset;
use yii\widgets\ListView;

$this->title = Yii::$app->name;

$this->registerCssFile('css/custom.css', ['depends' => MaterialAsset::className()]);
?>

<div class="site-index">

    <div class="col-md-8 col-md-offset-2">
        <?php echo ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => function ($model, $view, $index, $widget) {
                return $this->render('_item', ['model' => $model]);
            }
        ]) ?>
    </div>
</div>
