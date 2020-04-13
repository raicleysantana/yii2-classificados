<?php

use yii\helpers\Url;
use yii\widgets\Pjax; ?>

<div class="panel panel-danger">
    <div class="panel-body">
        <h2 class="vaga-titulo"><a
                    href="<?= Url::to(['view_vaga', 'id' => $model->vaga_id]) ?>"><?= $model->vaga_titulo ?></a>
        </h2>

        <small>Publicado: <?= Yii::$app->formatter->asDate($model->vaga_publicado, 'dd/MM/Y H:mm'); ?></small>
        <small style="margin-left: 15px">Por: <?= $model->user->userProfile->fullName ?></small>
        <br>
        <div style="margin: 5px 0">
            <?= $model->vaga_descricao ?>
        </div>
        <div class="row">
            <?php if ($contato = $model->vaga_contato): ?>
                <div class="col-md-6">
                    <i class="fa fa-envelope-open-o vaga-icone" aria-hidden="true" title="Contato"></i><?= $contato; ?>
                </div>
            <?php endif; ?>

            <?php if ($empresa = $model->vaga_empresa): ?>
                <div class="col-md-6">
                    <i class="fa fa-building-o vaga-icone" aria-hidden="true" title="Empresa"></i><?= $empresa; ?>
                </div>
            <?php endif; ?>
        </div>
        <hr>
        <?php
        Pjax::begin(['id' => 'container-curtida-' . $model->vaga_id]);
        ?>
        2 <?= $this->render('_curtida', ['model' => $model]); ?>
        <?php Pjax::end(); ?>
    </div>
</div>
