<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RuleGroupRule */

$this->title = Yii::t('app', 'Update Rule Group Rule: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Rule Group Rules'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="row rule-group-rule-update">
    <div class="col-xs-10 col-sm-8 col-md-6 col-lg-6">
        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>
