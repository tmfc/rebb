<?php

use app\models\enums\EnableStatus;
use kartik\select2\Select2;
use yii\helpers\Html;
use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Scene */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="scene-form">

    <?php $form = ActiveForm::begin([
        'type' => ActiveForm::TYPE_HORIZONTAL,
        'formConfig' => [
            'labelSpan' => 3,
            'deviceSize' => ActiveForm::SIZE_MEDIUM
        ]]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->widget(Select2::class, [
        'data' => EnableStatus::listData(),
        'options' => ['placeholder' => 'Select a scene ...'],
        'pluginOptions' => [
            'allowClear' => false
        ],
    ]) ?>

    <div class="form-group row">
        <div class="col-md-3"></div>
        <div class="col-md-9">
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
