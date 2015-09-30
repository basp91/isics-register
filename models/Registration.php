<?php

namespace app\models;

use Yii;
use app\models\RegistrationType;

/**
 * This is the model class for table "registration".
 *
 * @property integer $id
 * @property integer $registration_type_id
 * @property string $organization_name
 * @property string $first_name
 * @property string $last_name
 * @property string $display_name
 * @property string $degree
 * @property string $business_phone
 * @property string $fax
 * @property string $email
 * @property string $email2
 * @property string $address1
 * @property string $address2
 * @property string $city
 * @property string $state
 * @property string $province
 * @property integer $zip
 * @property string $country
 * @property string $student_id
 * @property string $payment_receipt
 * @property string $emergency_name
 * @property string $emergency_phone
 * @property string $token
 *
 * @property Invoice $invoice
 * @property RegistrationTyp $registrationType
 */
class Registration extends \yii\db\ActiveRecord
{
    public $file_payment_receipt;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'registration';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [ //se checan en orden estas reglas
            [['registration_type_id', 'organization_name', 'first_name', 'last_name', 'display_name', 'business_phone', 'email', 'country', 'emergency_name', 'emergency_phone', 'token'], 'required'],
            [['registration_type_id', 'zip'], 'integer'],
            [['organization_name', 'first_name', 'address1', 'address2', 'emergency_name'], 'string', 'max' => 150],
            [['last_name', 'display_name', 'email', 'email2', 'token'], 'string', 'max' => 100],
            [['degree', 'business_phone', 'fax', 'city', 'state', 'province', 'country', 'student_id', 'payment_receipt', 'emergency_phone'], 'string', 'max' => 45],
            [['email','student_id','payment_receipt', 'token'], 'unique'],
            [['email','email2'], 'email'],
            [['email2'],'compare','compareAttribute'=>'email'],

            //[['registration_type_id'], 'in', 'range' => RegistrationType::find()->select('id')->asArray()->column()],
            //[['registration_type_id'], 'exist', 'targetClass' => 'app\models\RegistrationType', 'targetAttribute' => 'id' ],
            [['registration_type_id'], 'exist', 'targetClass' => RegistrationType::className(), 'targetAttribute' => 'id' ],
            [['file_payment_receipt'], 'file', 'skipOnEmpty' => false, 'extensions' => 'pdf,png,jpg,jpeg,bmp,doc,docx'],

            /*
            [['business_phone', 'fax'],'match',
                'pattern' => '/^(?:1(?:[. -])?)?(?:\((?=\d{3}\)))?([2-9]\d{2})(?:(?<=\(\d{3})\))? ?(?:(?<=\d{3})[.-])?([2-9]\d{2})[. -]?(\d{4})(?: (?i:ext)\.? ?(\d{1,5}))?$/',
                'message' => '{attribute} is invalid. Please enter your {attribute} with area code in a valid format (e.g. 999-999-9999)'
            ]
            */
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'registration_type_id' => Yii::t('app', 'Registration Type ID'),
            'organization_name' => Yii::t('app', 'Organization Name'),
            'first_name' => Yii::t('app', 'First Name'),
            'last_name' => Yii::t('app', 'Last Name'),
            'display_name' => Yii::t('app', 'Display Name'),
            'degree' => Yii::t('app', 'Degree'),
            'business_phone' => Yii::t('app', 'Business Phone'),
            'fax' => Yii::t('app', 'Fax'),
            'email' => Yii::t('app', 'Email'),
            'email2' => Yii::t('app', 'Email2'),
            'address1' => Yii::t('app', 'Address1'),
            'address2' => Yii::t('app', 'Address2'),
            'city' => Yii::t('app', 'City'),
            'state' => Yii::t('app', 'State'),
            'province' => Yii::t('app', 'Province'),
            'zip' => Yii::t('app', 'Zip'),
            'country' => Yii::t('app', 'Country'),
            'student_id' => Yii::t('app', 'Student ID'),
            'payment_receipt' => Yii::t('app', 'Payment Receipt'),
            'emergency_name' => Yii::t('app', 'Emergency Name'),
            'emergency_phone' => Yii::t('app', 'Emergency Phone'),
            'token' => Yii::t('app', 'Token'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvoice()
    {
        return $this->hasOne(Invoice::className(), ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRegistrationType()
    {
        return $this->hasOne(RegistrationTyp::className(), ['id' => 'registration_type_id']);
    }

    /**
     * @param bool $insert
     * @return bool
     */
    public function beforeSave($insert){
        if(parent::beforeSave($insert)){
            $fileNamePaymentReceipt = uniqid().'.'.$this->file_payment_receipt->extension;
            $this->file_payment_receipt->saveAs('files/payment/'.$fileNamePaymentReceipt);
            $this->payment_receipt = $fileNamePaymentReceipt;
            if(empty($this->student_id)){
                $this->student_id = null;
            }
            return true;
        };
        return false;
    }
}