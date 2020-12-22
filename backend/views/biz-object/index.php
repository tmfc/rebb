<?php

use yii\helpers\Html;
use kartik\grid\GridView;;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BizObjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Biz Objects');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin_index biz-object-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'description',
            'scene_id',
            'definition:ntext',
            //'author_id',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
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
                            'title' => Yii::t('app', 'Create BizObject'),
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
              'heading' => '<i class="fas fa-cubes"></i>  BizObject',
        ],
    ]); ?>


</div>
