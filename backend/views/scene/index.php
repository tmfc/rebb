<?php

use yii\helpers\Html;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RuleTemplateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Scenes');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="scene-index">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'name',
            'description',
            [
                'class' => 'kartik\grid\BooleanColumn',
                'attribute' => 'status',
                'vAlign' => 'middle'
            ],
            'created_at',
            'updated_at',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{view} {update}'],
        ],
        'containerOptions' => ['style' => 'overflow: auto'], // only set when $responsive = false
        'headerRowOptions' => ['class' => 'kartik-sheet-style'],
        'filterRowOptions' => ['class' => 'kartik-sheet-style'],
        // set your toolbar
        'toolbar' =>  [
            [
                'content' =>
                    Html::a('<i class="fa fa-plus"></i>',['create'], [
                        'class' => 'btn btn-success',
                        'title' => Yii::t('app', 'Create Scene'),
                    ]) . ' '.
                    Html::a('<i class="fa fa-repeat"></i>', ['index'], [
                        'class' => 'btn btn-outline-secondary',
                        'title'=>'Reset Grid',
                        'data-pjax' => 0,
                    ]),
                'options' => ['class' => 'btn-group mr-2']
            ],
        ],
        'panel' => [
            'type' => GridView::TYPE_DEFAULT,
            'heading' => '<i class="fas fa-cubes"></i>  Scene',
        ],
    ]); ?>


</div>
