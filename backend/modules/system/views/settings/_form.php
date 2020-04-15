<?php

use common\components\keyStorage\FormWidget;

$this->title = $title;
$this->params['breadcrumbs'] = $breadcrumbs;
?>
<?php

echo FormWidget::widget([
    'model' => $model,
    'formClass' => '\yii\bootstrap\ActiveForm',
    'submitText' => Yii::t('backend', 'Save'),
    'submitOptions' => ['class' => 'btn btn-primary'],
]) ;
?>