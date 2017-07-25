<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "discounts".
 *
 * @property integer $id
 * @property string $code
 * @property string $from_date
 * @property string $to_date
 * @property string $percentage
 * @property integer $status
 *
 * @property Booking[] $bookings
 */
class Discounts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'discounts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['from_date', 'to_date'], 'safe'],
            [['percentage'], 'number'],
            [['status'], 'integer'],
            [['code'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'from_date' => 'From Date',
            'to_date' => 'To Date',
            'percentage' => 'Percentage',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBookings()
    {
        return $this->hasMany(Booking::className(), ['discount_id' => 'id']);
    }
}
