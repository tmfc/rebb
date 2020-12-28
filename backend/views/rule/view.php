<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Rule */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Rules'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="row rule-view">

    <div class="col-xs-12 col-sm-10 col-md-10 col-lg-8">

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
                [
                    'attribute'=>'scene_id',
                    'value'=>$model->scene->name,
                ],
                [
                    'attribute'=>'author_id',
                    'value'=>$model->author->username,
                ],

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
                'created_at',
                'updated_at',
            ],
        ]) ?>
    </div>
</div>
