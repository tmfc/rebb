<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RuleGroupRule */

$this->title = Yii::t('app', 'Create Rule Group Rule');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Rule Group Rules'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row rule-group-rule-create">
    <div class="col-xs-10 col-sm-8 col-md-6 col-lg-6">

        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>
