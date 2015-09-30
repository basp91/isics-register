<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\RegistrationType;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Registration */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="registration-form">

    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'options' => [
            'enctype' => 'multipart/form-data'
        ]
    ]); ?>

    <?= $form->field($model, 'registration_type_id')->radioList(
        ArrayHelper::map(RegistrationType::find()->all(),'id','name')
    )?>

    <?= $form->field($model, 'organization_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'first_name')->textInput([
        'maxlength' => true,
        'onChange' => "$('#registration-display_name').val(
            $('#registration-first_name').val()+' '+$('#registration-last_name').val()
        )"
    ]) ?>

    <?= $form->field($model, 'last_name')->textInput([
        'maxlength' => true,
        'onChange' => "$('#registration-display_name').val(
            $('#registration-first_name').val()+' '+$('#registration-last_name').val()
        )"
    ]) ?>

    <?= $form->field($model, 'display_name')->textInput([
        'maxlength' => true,
    ]) ?>

    <?= $form->field($model, 'degree')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'business_phone')->textInput([
        'maxlength' => true,
        'placeholder' => '000-000-0000'
    ]) ?>

    <?= $form->field($model, 'fax')->textInput([
        'maxlength' => true,
        'placeholder' => '000-000-0000'
    ]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'state')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'province')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'zip')->textInput() ?>

    <?= $form->field($model, 'country')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'student_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'file_student_id')->fileInput() ?>

    <?= $form->field($model, 'file_payment_receipt')->fileInput() ?>

    <?= $form->field($model, 'emergency_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'emergency_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'token')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
