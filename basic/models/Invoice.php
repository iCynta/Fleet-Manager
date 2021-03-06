<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "invoice".
 *
 * @property integer $id
 * @property string $invoice_code
 * @property integer $customer_id
 * @property string $date
 * @property string $total
 * @property integer $payment_method
 * @property integer $payment_status
 * @property string $paid_date
 * @property string $generated_by
 *
 * @property Customer $customer
 * @property InvoiceDetails[] $invoiceDetails
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
            [['invoice_code'], 'required'],
            [['customer_id', 'payment_method', 'payment_status'], 'integer'],
            [['date', 'paid_date'], 'safe'],
            [['total'], 'number'],
            [['invoice_code'], 'string', 'max' => 10],
            [['generated_by'], 'string', 'max' => 45],
            [['invoice_code'], 'unique'],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::className(), 'targetAttribute' => ['customer_id' => 'id']],
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
            'customer_id' => 'Customer ID',
            'date' => 'Date',
            'total' => 'Total',
            'payment_method' => 'Payment Method',
            'payment_status' => 'Payment Status',
            'paid_date' => 'Paid Date',
            'generated_by' => 'Generated By',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['id' => 'customer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInvoiceDetails()
    {
        return $this->hasMany(InvoiceDetails::className(), ['invoice_code' => 'invoice_code']);
    }
}
