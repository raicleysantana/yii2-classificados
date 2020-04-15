<?php
/**
 * @author Eugene Terentev <eugene@terentev.net>
 */

use common\components\keyStorage\FormWidget;
use yii\helpers\Html;

/**
 * @var $model \common\components\keyStorage\FormModel
 */

$this->title = Yii::t('backend', 'Application settings');

?>

<?= Html::a(' <i class="fa fa-cogs"></i> Sistema', '/system/settings/sistema', ['class' => 'btn btn-app btn-flat']); ?>
<?= Html::a(' <i class="fa fa-feed"></i> SEO', '#', ['class' => 'btn btn-app btn-flat']); ?>
