<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\RuleTemplate */

$this->title = Yii::t('app', 'Create Rule Template');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Rule Templates'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row rule-template-create">
    <div class="col-xs-10 col-sm-8 col-md-10 col-lg-8">

        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>
