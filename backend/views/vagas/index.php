<?php

use common\components\helpers\Date;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\VagaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vagas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vagas-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('Criar Vagas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'vaga_id',
            'vaga_titulo',
            ['attribute' => 'vaga_publicado', 'value' => function ($model) {
                return Date::widget([
                    'value' => $model->vaga_publicado,
                    'format' => 'short',
                ]);
            }],
            ['attribute' => 'vaga_status', 'value' => function ($model) {
                return $model->traducao('vaga_status');
            },
                'filter' => $searchModel->getSituacaoOptions(),
            ],
            'vaga_contato',
            'vaga_empresa',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
