<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property integer $id
 * @property string $fname
 * @property string $sname
 * @property string $mobile
 * @property string $email
 * @property string $identification_doc
 * @property string $registered_on
 * @property string $time_stamp
 *
 * @property Invoice[] $invoices
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id'], 'integer'],
            [['registered_on'], 'safe'],
            [['fname', 'sname', 'time_stamp'], 'string', 'max' => 45],
            [['mobile'], 'string', 'max' => 25],
            [['email', 'identification_doc'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fname' => 'Fname',
            'sname' => 'Sname',
            'mobile' => 'Mobile',
            'email' => 'Email',
            'identification_doc' => 'Identification Doc',
            'registered_on' => 'Registered On',
            'time_stamp' => 'Time Stamp',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvoices()
    {
        return $this->hasMany(Invoice::className(), ['customer_id' => 'id']);
    }
}
