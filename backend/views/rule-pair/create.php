<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RulePair */

$this->title = Yii::t('app', 'Create Rule Pair');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Rule Pairs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row rule-pair-create">
    <div class="col-xs-10 col-sm-8 col-md-6 col-lg-6">

        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>
