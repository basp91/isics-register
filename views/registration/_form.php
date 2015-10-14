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

<?php $this->registerJs('

    var registration_type = $("[name~=\'Registration[registration_type_id]\']")
    var requires_invoice = $("[name~=\'Registration[requires_invoice]\']")
    var same_adress = $("[name~=\'Registration[same_adress]\']")

    function toggleStudentId()
    {
        var registration_type_selected = $("[name~=\'Registration[registration_type_id]\']:checked").val()
        var student_id = $("[name~=\'Registration[student_id]\']")
        var file_student_id = $("[name~=\'Registration[file_student_id]\']")
        switch(registration_type_selected)
        {
            case "2":
            case "4":
            case "5":
                student_id.prop("disabled", false);
                $(".field-registration-student_id").show()
                file_student_id.prop("disabled", false);
                $(".field-registration-file_student_id").show()
                break;
            default:
                student_id.prop("disabled", true);
                $(".field-registration-student_id").hide()
                file_student_id.prop("disabled", true);
                $(".field-registration-file_student_id").hide()
                break;
        }
    }

    function toggleInvoice()
    {
        var selected_invoice = $("[name~=\'Registration[requires_invoice]\']:checked").val()

        var invoice_business_name = $("[name~=\'Invoice[business_name]\']")
        var invoice_rfc = $("[name~=\'Invoice[rfc]\']")
        var invoice_address = $("[name~=\'Invoice[address]\']")
        var invoice_zip = $("[name~=\'Invoice[zip]\']")
        var invoice_city = $("[name~=\'Invoice[city]\']")
        var invoice_state = $("[name~=\'Invoice[state]\']")
        var invoice_email = $("[name~=\'Invoice[email]\']")
        var registration_same_adress = $("[name~=\'Registration[same_adress]\']")

        switch(selected_invoice){
            case "1":
                invoice_business_name   .prop("disabled", false);
                invoice_rfc             .prop("disabled", false);
                invoice_address         .prop("disabled", false);
                invoice_zip             .prop("disabled", false);
                invoice_city            .prop("disabled", false);
                invoice_state           .prop("disabled", false);
                invoice_email           .prop("disabled", false);
                registration_same_adress.prop("disabled", false);

                $(".field-invoice-business_name")   .show()
                $(".field-invoice-rfc")             .show()
                $(".field-invoice-address")         .show()
                $(".field-invoice-zip")             .show()
                $(".field-invoice-city ")           .show()
                $(".field-invoice-state")           .show()
                $(".field-invoice-email")           .show()
                $(".field-registration-same_adress").show()
                break;

            case "0":
                invoice_business_name   .prop("disabled", true);
                invoice_rfc             .prop("disabled", true);
                invoice_address         .prop("disabled", true);
                invoice_zip             .prop("disabled", true);
                invoice_city            .prop("disabled", true);
                invoice_state           .prop("disabled", true);
                invoice_email           .prop("disabled", true);
                registration_same_adress.prop("disabled", true);

                $(".field-invoice-business_name")   .hide()
                $(".field-invoice-rfc")             .hide()
                $(".field-invoice-address")         .hide()
                $(".field-invoice-zip")             .hide()
                $(".field-invoice-city ")           .hide()
                $(".field-invoice-state")           .hide()
                $(".field-invoice-email")           .hide()
                $(".field-registration-same_adress").hide()
                break;
        }
    }

    function copyAdress()
    {
        var same_adress_selected = $("[name~=\'Registration[same_adress]\']:checked").val()
        var invoice_address = $("[name~=\'Invoice[address]\']")
        var registration_address1 = $("[name~=\'Registration[address1]\']")
        var registration_address2 = $("[name~=\'Registration[address2]\']")

        switch(same_adress_selected) {
            case "0":
                invoice_address.val("");
                break;
            case "1":
                if( (registration_address1.val() || registration_address2.val()) != null ){
                    invoice_address.val( registration_address1.val() + " " + registration_address2.val());
                }
                break;
        }
    }

    toggleStudentId();
    toggleInvoice();

    registration_type.change(function(){
        toggleStudentId();
    })

    same_adress.change(function(){
        copyAdress();
    })

    requires_invoice.change(function(){
        toggleInvoice();
    })


') ?>

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

    <?= $form->field($registration_model, 'emergency_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($registration_model, 'emergency_phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($registration_model, 'student_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($registration_model, 'file_student_id')->fileInput() ?>

    <?= $form->field($registration_model, 'file_payment_receipt')->fileInput() ?>

    <?= $form->field($registration_model, 'requires_invoice')->radioList(
       [
           0 => 'No',
           1 => 'Yes'
       ]
    )?>

    <!-- INVOICE start-->
    <?= $form->field($invoice_model, 'business_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($invoice_model, 'rfc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($registration_model, 'same_adress')->radioList(
        [
            0 => 'No',
            1 => 'Yes'
        ]
    )?>
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
