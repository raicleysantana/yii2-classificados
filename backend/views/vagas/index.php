<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\VagasSearch */
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
            ['class' => 'yii\grid\SerialColumn'],

            'vaga_id',
            'vaga_titulo',
            'vaga_empresa',
            'vaga_contato',
            'vaga_publicado',
            // 'vaga_status',
            // 'vaga_descricao:ntext',
            // 'vaga_arquivo',
            // 'user_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
