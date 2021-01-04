<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RuleParam */

$this->title = 'Update Rule Param: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Rule Params', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="row rule-param-update">
    <div class="col-xs-10 col-sm-8 col-md-6 col-lg-6">
        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>
