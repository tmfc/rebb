<?php

use yii\helpers\Html;
use yii\web\YiiAsset;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\BizObject */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Biz Objects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);
?>
<div class="row biz-object-view">

    <div class="col-xs-12 col-sm-10 col-md-10 col-lg-8">

        <h1><?= Html::encode($this->title) ?></h1>
        <p>
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ]) ?>
        </p>
        <?= DetailView::widget([
            'model' => $model,

            'attributes' => [
                'id',
                'name',
                'description',
                'scene_id',
                'definition:ntext',
                [
                    'attribute'=>'definition',
                    'format'=>'raw',
                    'value'=>trntv\aceeditor\AceEditor::widget([
                        // You can either use it for model attribute
                        'model' => $model,
                        'attribute' => 'definition',

                        'mode'=>'html', // programing language mode. Default "html"
                        'theme'=>'github', // editor theme. Default "github"
                        'readOnly'=>'true' // Read-only mode on/off = true/false. Default "false"
                    ]),

                ],
                'author_id',
                'created_at',
                'updated_at',
            ],
        ]) ?>
    </div>
</div>
