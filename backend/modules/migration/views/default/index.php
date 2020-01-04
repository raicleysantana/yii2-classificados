<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Migrations';
//$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Migrations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    .highlighted_grid_row{
        font-weight: bold;
    }

    .up{
        color: limegreen;
    }

    .down{
        color: red;
    }
</style>

<div class="user-view">

    <?php echo GridView::widget([
        'dataProvider' => $provider,
        'filterModel' => null,
        'options' => [
            'class' => 'grid-view table-responsive'
        ],
        'rowOptions' => function ($model, $key, $index, $grid) {

            $class = array();

            if(!isset($model['nova'])){
                $class[] = 'success';
            }

            if($model['atual']) {
                $class[] = 'highlighted_grid_row';

            }

            return ['class' => implode(' ', $class)];
        },
        'columns' => [
            [
                'class' => 'yii\grid\DataColumn',
                'format' => 'raw',
                'value' => function ($data) {
                    return $data['name'].($data['atual']?' <span class="fa fa-star"></span> ':'');
                },
            ],

            [
                'class' => 'yii\grid\DataColumn',
                'header' => 'Status',
                'value' => function ($data) {

                    if(isset($data['nova'])){
                        return 'NOVA';
                    }elseif($data['atual']) {
                        return 'ATUAL';
                    }else{
                        return 'EXECUTADA';
                    }
                },
            ],

            'time:datetime:Data/Hora',
            // 'updated_at',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{up} {down} {view} ',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a(
                            '<i class="fa fa-check" aria-hidden="true"></i>',
                            Url::to(['marcar', 'version' => $model['name']]),
                            [
                                'title' => 'Marcar esta versão'
                            ]
                        );
                    },

                    'up' => function ($url, $model) {
                        return Html::a(
                            '<i class="fa fa-arrow-circle-up up" aria-hidden="true"></i>',
                            Url::to(['up', 'version' => $model['name']]),
                            [
                                'title' => 'Subir esta Migration'
                            ]
                        );
                    },

                    'down' => function ($url, $model) {
                        return Html::a(
                            '<i class="fa fa-arrow-circle-down down" aria-hidden="true"></i>',
                            Url::to(['down', 'version' => $model['name']]),
                            [
                                'title' => 'Desfazer esta Migration'
                            ]
                        );
                    },
                ],
                'visibleButtons' => [
                    'up' => function ($model, $key, $index) {
                        return isset($model['nova']);
                    },

                    'down' => function ($model, $key, $index) {
                        return $model['atual'];
                    },

                    'view' => function ($model, $key, $index) {
                        return !$model['atual'];
                    }
                ]

            ],
        ],
    ]); ?>

</div>