<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "booking".
 *
 * @property integer $id
 * @property integer $vehicle_id
 * @property string $from_date
 * @property string $to_date
 * @property string $actual_return_date
 * @property integer $status
 * @property integer $discount_id
 * @property integer $booking_source
 *
 * @property BookingSource $bookingSource
 * @property Discounts $discount
 */
class Booking extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'booking';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vehicle_id', 'status', 'discount_id', 'booking_source'], 'integer'],
            [['from_date', 'to_date', 'actual_return_date'], 'safe'],
            [['booking_source'], 'exist', 'skipOnError' => true, 'targetClass' => BookingSource::className(), 'targetAttribute' => ['booking_source' => 'id']],
            [['discount_id'], 'exist', 'skipOnError' => true, 'targetClass' => Discounts::className(), 'targetAttribute' => ['discount_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'vehicle_id' => 'Vehicle ID',
            'from_date' => 'From Date',
            'to_date' => 'To Date',
            'actual_return_date' => 'Actual Return Date',
            'status' => 'Status',
            'discount_id' => 'Discount ID',
            'booking_source' => 'Booking Source',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBookingSource()
    {
        return $this->hasOne(BookingSource::className(), ['id' => 'booking_source']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiscount()
    {
        return $this->hasOne(Discounts::className(), ['id' => 'discount_id']);
    }
}
