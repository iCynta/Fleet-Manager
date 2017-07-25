<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "service_history".
 *
 * @property integer $id
 * @property integer $vehicle_service_id
 * @property integer $type
 * @property string $date
 * @property string $description
 * @property string $amount
 *
 * @property ServiceType $type0
 * @property VehicleService $vehicleService
 */
class ServiceHistory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'service_history';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vehicle_service_id', 'type'], 'integer'],
            [['date'], 'safe'],
            [['description'], 'string'],
            [['amount'], 'number'],
            [['type'], 'exist', 'skipOnError' => true, 'targetClass' => ServiceType::className(), 'targetAttribute' => ['type' => 'id']],
            [['vehicle_service_id'], 'exist', 'skipOnError' => true, 'targetClass' => VehicleService::className(), 'targetAttribute' => ['vehicle_service_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'vehicle_service_id' => 'Vehicle Service ID',
            'type' => 'Type',
            'date' => 'Date',
            'description' => 'Description',
            'amount' => 'Amount',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getType0()
    {
        return $this->hasOne(ServiceType::className(), ['id' => 'type']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehicleService()
    {
        return $this->hasOne(VehicleService::className(), ['id' => 'vehicle_service_id']);
    }
}
