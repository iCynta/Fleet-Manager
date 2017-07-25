<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "invoice_details".
 *
 * @property integer $id
 * @property string $invoice_code
 * @property integer $vehicle_id
 * @property integer $days
 * @property string $amount
 *
 * @property Invoice $invoiceCode
 */
class InvoiceDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'invoice_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['invoice_code'], 'required'],
            [['vehicle_id', 'days'], 'integer'],
            [['amount'], 'number'],
            [['invoice_code'], 'string', 'max' => 10],
            [['invoice_code'], 'exist', 'skipOnError' => true, 'targetClass' => Invoice::className(), 'targetAttribute' => ['invoice_code' => 'invoice_code']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'invoice_code' => 'Invoice Code',
            'vehicle_id' => 'Vehicle ID',
            'days' => 'Days',
            'amount' => 'Amount',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvoiceCode()
    {
        return $this->hasOne(Invoice::className(), ['invoice_code' => 'invoice_code']);
    }
}
