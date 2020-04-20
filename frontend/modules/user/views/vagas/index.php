<?php

use common\components\helpers\Date;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\modules\user\models\search\vagaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vagas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vagas-index">


    <p>
        <?= Html::a('Cadastrar Vaga', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'vaga_id',
            'vaga_titulo',
            ['attribute' => 'vaga_publicado', 'value' => function ($model) {
                return Date::widget(['format' => 'd-MM-Y', 'value' => $model->vaga_publicado]);
            }],
            ['attribute' => 'vaga_status', 'value' => function ($model) {
                return $model->traducao('vaga_status');
            },
                'filter' => $searchModel->getSituacaoOptions(),
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
