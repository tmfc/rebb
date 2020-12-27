<?php

use app\models\Scene;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Rule */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rule-form">

    <?php $form = ActiveForm::begin([
        'type' => ActiveForm::TYPE_HORIZONTAL,
        'formConfig' => [
            'labelSpan' => 3,
            'deviceSize' => ActiveForm::SIZE_SMALL
        ]]); ?>

    <?= $form->field($model, 'scene_id')->widget(Select2::class, [
        'data' => ArrayHelper::map(Scene::getEnabledSceneList(), 'id', 'name'),
        'options' => ['placeholder' => 'Select a scene ...'],
        'pluginOptions' => [
            'allowClear' => false
        ],
    ]); ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'definition')->widget(
        'trntv\aceeditor\AceEditor',
        [
            'mode'=>'java', // programing language mode. Default "html"
            'theme'=>'clouds', // editor theme. Default "github"
        ]) ?>

    <div class="form-group row">
        <div class="col-md-3"></div>
        <div class="col-md-9">
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
