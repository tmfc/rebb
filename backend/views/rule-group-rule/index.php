<?php

use yii\helpers\Html;
use kartik\grid\GridView;;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RuleGroupRuleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Rule Group Rules');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="admin_index rule-group-rule-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'group_id',
            'rule_id',

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
                            'title' => Yii::t('app', 'Create RuleGroupRule'),
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
              'heading' => '<i class="fas fa-cubes"></i>  RuleGroupRule',
        ],
    ]); ?>


</div>
