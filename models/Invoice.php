<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "invoice".
 *
 * @property integer $id
 * @property string $business_name
 * @property string $rfc
 * @property string $address
 * @property integer $zip
 * @property string $city
 * @property string $state
 * @property string $email
 *
 * @property Registration $id0
 */
class Invoice extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'invoice';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'business_name', 'rfc', 'address', 'zip', 'city', 'state', 'email'], 'required'],
            [['id', 'zip'], 'integer'],
            [['business_name', 'address'], 'string', 'max' => 175],
            [['rfc'], 'string', 'max' => 20],
            [['city', 'state', 'email'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'business_name' => Yii::t('app', 'Business Name'),
            'rfc' => Yii::t('app', 'Rfc'),
            'address' => Yii::t('app', 'Address'),
            'zip' => Yii::t('app', 'Zip'),
            'city' => Yii::t('app', 'City'),
            'state' => Yii::t('app', 'State'),
            'email' => Yii::t('app', 'Email'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(Registration::className(), ['id' => 'id']);
    }
}
