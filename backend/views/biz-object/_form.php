<?php

use yii\helpers\Html;
use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BizObject */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="biz-object-form">

    <?php $form = ActiveForm::begin([
        'type' => ActiveForm::TYPE_HORIZONTAL,
        'formConfig' => [
            'labelSpan' => 3,
            'deviceSize' => ActiveForm::SIZE_SMALL
        ]]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'scene_id')->textInput() ?>

    <?= $form->field($model, 'definition')->widget(
        'trntv\aceeditor\AceEditor',
        [
            'mode'=>'java', // programing language mode. Default "html"
            'theme'=>'clouds', // editor theme. Default "github"
        ]) ?>
    <div class="form-group row">
        <div class="col-3"></div>
        <div class="col-9">
            <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
