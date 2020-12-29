<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RulePair */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Rule Pairs'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="row rule-pair-view">

    <div class="col-xs-10 col-sm-8 col-md-6 col-lg-6">

        <h1><?= Html::encode($this->title) ?></h1>
        <p>
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        </p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'name',
                'description',
                'entrance_code',
                'fail_code',
                'success_code',
                [
                    'attribute'=>'scene_id',
                    'value'=>$model->scene->name,
                ],
                [
                    'attribute'=>'author_id',
                    'value'=>$model->author->username,
                ],
                'created_at',
                'updated_at',
            ],
        ]) ?>
    </div>
</div>
