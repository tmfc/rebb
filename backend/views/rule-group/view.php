<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RuleGroup */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Rule Groups'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="row rule-group-view">

    <div class="col-xs-10 col-sm-8 col-md-6 col-lg-6">

        <h1><?= Html::encode($this->title) ?></h1>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
            'name',
            'description',
            'status',
            'scene_id',
            'author_id',
            'created_at',
            'updated_at',
            ],
        ]) ?>
    </div>
</div>
