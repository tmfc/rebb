<?php

use yii\helpers\Html;
use kartik\detail\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Scene */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Scenes'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="row scene-view">
    <div class="col-xs-10 col-sm-8 col-md-6 col-lg-6">

    <h1><?= Html::encode($this->title) ?></h1>

        <?= DetailView::widget([
            'model' => $model,
            'condensed'=>true,
            'hover'=>true,
            'mode'=>DetailView::MODE_VIEW,
            'panel'=>[
                'heading'=>'Scene # ' . $model->id,
                'type'=>DetailView::TYPE_INFO,
            ],
            'attributes' => [
                'id',
                'name',
                'description',
                'created_at',
                'updated_at',
            ],
        ]) ?>
    </div>
</div>
