<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Curso */

$this->title = 'Cadastrar Curso';
$this->params['breadcrumbs'][] = ['label' => 'Cursos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="curso-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
