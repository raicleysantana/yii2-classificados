<?php

use lo\widgets\magnific\MagnificPopup;
use ramosisw\CImaterial\web\MaterialAsset;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = $model->vaga_id . ' # ' . $model->vaga_titulo;
$this->params['breadcrumbs'][] = $this->title;

$this->registerCssFile('css/custom.css', ['depends' => MaterialAsset::className()]);
?>

<style>
    .vaga-titulo {
        font-size: 24px;
        font-weight: 600;
    }
</style>
<div class="site-vaga">

    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-body">
                <h1 class="vaga-titulo"><?php echo Html::encode($this->title) ?></h1>
                <small>Publicado: <?= Yii::$app->formatter->asDate($model->vaga_publicado, 'dd/MM/Y H:mm'); ?></small>
                <small style="margin-left: 15px">Por: <?= $model->user->userProfile->fullName ?></small>

                <div style="margin: 5px 0">
                    <?= $model->vaga_descricao ?>
                </div>
                <div class="row">
                    <?php if ($contato = $model->vaga_contato): ?>
                        <div class="col-md-6">
                            <i class="fa fa-envelope-open-o vaga-icone" aria-hidden="true"
                               title="Contato"></i><?= $contato; ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($empresa = $model->vaga_empresa): ?>
                        <div class="col-md-6">
                            <i class="fa fa-building-o vaga-icone" aria-hidden="true"
                               title="Empresa"></i><?= $empresa; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>


</div>
