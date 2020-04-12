<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Vagas */

$this->title = 'Cadastrar Vagas';
$this->params['breadcrumbs'][] = ['label' => 'Vagas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vagas-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
