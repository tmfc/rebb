<?php

use app\models\Scene;
use common\models\User;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use kartik\grid\GridView;;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RuleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Rules');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin_index rule-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'scene_id',
                'vAlign' => 'middle',
                'width' => '180px',
                'value' => function ($model, $key, $index, $widget) {
                    return $model->scene->name;
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => ArrayHelper::map(Scene::getEnabledSceneList(), 'id', 'name'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Any scene', 'multiple' => true], // allows multiple authors to be chosen
                'format' => 'raw'
            ],
            [
                'attribute' => 'author_id',
                'vAlign' => 'middle',
                'width' => '180px',
                'value' => function ($model, $key, $index, $widget) {
                    return $model->author->username;
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => ArrayHelper::map(User::find()->orderBy('username')->asArray()->all(), 'id', 'username'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Any author', 'multiple' => true], // allows multiple authors to be chosen
                'format' => 'raw'
            ],
            'name',
            'description',
            'created_at',
            //'updated_at',

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
                            'title' => Yii::t('app', 'Create Rule'),
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
              'heading' => '<i class="fas fa-cubes"></i>  Rule',
        ],
    ]); ?>


</div>
