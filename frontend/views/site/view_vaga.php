<?php

use kartik\social\FacebookPlugin;
use ramosisw\CImaterial\web\MaterialAsset;
use yii\helpers\Html;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = $model->vaga_id . ' # ' . $model->vaga_titulo;
$this->params['breadcrumbs'][] = $this->title;

$this->registerCssFile('css/custom.css', ['depends' => MaterialAsset::className()]);

$this->registerMetaTag(['property' => 'og:url', 'content' => Yii::$app->homeUrl . Yii::$app->request->url]);
$this->registerMetaTag(['property' => 'og:title', 'content' => $this->title]);
$this->registerMetaTag(['property' => 'og:type', 'content' => 'website']);
$this->registerMetaTag(['property' => 'og:image', 'content' => $model->imagem]);
?>

<style>
    .vaga-titulo {
        font-size: 24px;
        font-weight: 600;
    }

    .items {
        float: left;
        margin-left: 15px;
    }
</style>
<div class="site-vaga">

    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-body">
                <h1 class="vaga-titulo"><?php echo Html::encode($this->title) ?></h1>
                <small>Publicado: <?= Yii::$app->formatter->asDate($model->vaga_publicado, 'dd/MM/Y H:mm'); ?></small>
                <small style="margin-left: 15px">Por: <?= $model->user->userProfile->fullName ?></small>

                <?php if ($model->vaga_img_path): ?>
                    <div class="row">
                        <div class="col-sm-12" align="center">
                            <?= Html::img($model->imagem, ['class' => 'img-responsive']); ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if ($descricao = $model->vaga_descricao): ?>
                    <div style="margin: 5px 0">
                        <?= $descricao ?>
                    </div>
                <?php endif; ?>

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
                <hr>
                <div class="items">
                    <?php echo FacebookPlugin::widget([
                        'type' => FacebookPlugin::SHARE,
                        'language' => 'pt_BR',
                        'settings' =>
                            [
                                'size' => 'small',
                                'layout' => 'button_count',
                                'mobile_iframe' => false,
                            ],
                    ]); ?>
                </div>
            </div>
        </div>
    </div>


</div>
