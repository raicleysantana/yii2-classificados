<?php
/* @var $this yii\web\View */

use yii\widgets\ListView;

$this->title = Yii::$app->name;
?>
<style>
    .vaga-titulo {
        font-weight: 600;
        color: #012237;
        font-size: 24px;
        margin: 0;
        margin-bottom: 5px;
    }

    .vaga-icone {
        margin-right: 10px;
        transition: all .4s ease;
        font-size: 15px;
        color: #f16101;
    }

    .vaga-icone:hover {
        color: #012237;
    }

    .orange {
        color: #f16101;
    }
</style>
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
