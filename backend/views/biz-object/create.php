<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BizObject */

$this->title = Yii::t('app', 'Create Biz Object');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Biz Objects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row biz-object-create">
    <div class="col-xs-10 col-sm-10 col-md-10 col-lg-8">

        <h1><?= Html::encode($this->title) ?></h1>

        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>
</div>
