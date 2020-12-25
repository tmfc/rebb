<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BizObject */

$this->title = Yii::t('app', 'Update Biz Object: {name}', [
    'name' => $model->name,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Biz Objects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="row biz-object-update">
    <div class="col-xs-10 col-sm-10 col-md-10 col-lg-8">
        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>
