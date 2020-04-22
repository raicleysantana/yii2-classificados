<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Curso */

$this->title = 'Alterar Curso: ' . ' ' . $model->cur_id;
$this->params['breadcrumbs'][] = ['label' => 'Cursos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cur_id, 'url' => ['view', 'id' => $model->cur_id]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="curso-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
