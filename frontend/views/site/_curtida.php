<?php

use common\models\Curtida; ?>

<?php

$ip = Yii::$app->request->getUserIP();
$userId = Yii::$app->user->id;

$curtida = Curtida::find()->where(['vaga_id' => $model->vaga_id])
    ->andWhere(['or', ['ip' => $ip], ['user_id' => $userId]])
    ->one();

if (!$curtida):
    ?>

    <i class="fa fa-heart icone-gostei" onclick="
            $.ajax({
            type: 'POST',
            url: '/site/curtir?id=<?= $model->vaga_id; ?>',
            data: {id: <?= $model->vaga_id; ?>},
            success: function(result) {
            $.pjax.reload({container: '#container-curtida-<?= $model->vaga_id; ?>'});
            },
            error: function(result) {

            }
            });
            "></i>

<?php
else:
    ?>
    <i class="fa fa-heart icone-gostei icone-gostei-ativo" onclick="
            $.ajax({
            type: 'POST',
            url: '/site/descurtir?id=<?= $model->vaga_id; ?>',
            data: {id: <?= $model->vaga_id; ?>},
            success: function(result) {
            $.pjax.reload({container: '#container-curtida-<?= $model->vaga_id; ?>'});
            },
            error: function(result) {

            }
            });
            ">
    </i>
<?php endif; ?>