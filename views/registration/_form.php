<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\RegistrationType;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $registration_model app\models\Registration */
/* @var $invoice_model app\models\Invoice */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="registration-form">

    <?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'options' => [
            'enctype' => 'multipart/form-data'
        ]
    ]); ?>

    <?= $form->field($registration_model, 'registration_type_id')->radioList(
        ArrayHelper::map(RegistrationType::find()->all(),'id','name')
    )?>

    <?= $form->field($registration_model, 'organization_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($registration_model, 'first_name')->textInput([
        'maxlength' => true,
        'onChange' => "$('#registration-display_name').val(
            $('#registration-first_name').val()+' '+$('#registration-last_name').val()
        )"
    ]) ?>

    <?= $form->field($registration_model, 'last_name')->textInput([
        'maxlength' => true,
        'onChange' => "$('#registration-display_name').val(
            $('#registration-first_name').val()+' '+$('#registration-last_name').val()
        )"
    ]) ?>

    <?= $form->field($registration_model, 'display_name')->textInput([
        'maxlength' => true,
    ]) ?>

    <?= $form->field($registration_model, 'degree')->textInput(['maxlength' => true]) ?>

    <?= $form->field($registration_model, 'business_phone')->textInput([
        'maxlength' => true,
        'placeholder' => '000-000-0000'
    ]) ?>

    <?= $form->field($registration_model, 'fax')->textInput([
        'maxlength' => true,
        'placeholder' => '000-000-0000'
    ]) ?>

    <?= $form->field($registration_model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($registration_model, 'email2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($registration_model, 'address1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($registration_model, 'address2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($registration_model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($registration_model, 'state')->textInput(['maxlength' => true]) ?>

    <?= $form->field($registration_model, 'province')->textInput(['maxlength' => true]) ?>

    <?= $form->field($registration_model, 'zip')->textInput() ?>

    <?= $form->field($registration_model, 'country')->textInput(['maxlength' => true]) ?>

    <?= $form->field($registration_model, 'student_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($registration_model, 'file_student_id')->fileInput() ?>

    <?= $form->field($registration_model, 'file_payment_receipt')->fileInput() ?>

    <?= $form->field($registration_model, 'emergency_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($registration_model, 'emergency_phone')->textInput(['maxlength' => true]) ?>


    <!-- INVOICE start-->
    <!-- ?= $form->field($invoice_model, 'id')->textInput() ?-->

    <?= $form->field($invoice_model, 'business_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($invoice_model, 'rfc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($invoice_model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($invoice_model, 'zip')->textInput() ?>

    <?= $form->field($invoice_model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($invoice_model, 'state')->textInput(['maxlength' => true]) ?>

    <?= $form->field($invoice_model, 'email')->textInput(['maxlength' => true]) ?>
    <!-- INVOICE end-->

    <div class="form-group">
        <?= Html::submitButton($registration_model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $registration_model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
