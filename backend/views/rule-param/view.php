<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\RuleParam */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Rule Params', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="row rule-param-view">

    <div class="col-xs-10 col-sm-8 col-md-6 col-lg-6">

        <h1><?= Html::encode($this->title) ?></h1>
        <p>
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        </p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
            'rule_id',
            'name',
            'description',
            'type',
            'default_value:ntext',
            'constraints:ntext',
            'created_at',
            'updated_at',
            ],
        ]) ?>
    </div>
</div>
