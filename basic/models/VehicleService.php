<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vehicle_service".
 *
 * @property integer $id
 * @property integer $vehicle_id
 * @property string $next_service_date
 * @property string $detail
 * @property integer $service_type_id
 *
 * @property ServiceHistory[] $serviceHistories
 * @property VehicleMaster $vehicle
 */
class VehicleService extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vehicle_service';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'required'],
            [['id', 'vehicle_id', 'service_type_id'], 'integer'],
            [['next_service_date'], 'safe'],
            [['detail'], 'string'],
            [['vehicle_id'], 'exist', 'skipOnError' => true, 'targetClass' => VehicleMaster::className(), 'targetAttribute' => ['vehicle_id' => 'id']],
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
            'next_service_date' => 'Next Service Date',
            'detail' => 'Detail',
            'service_type_id' => 'Service Type ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServiceHistories()
    {
        return $this->hasMany(ServiceHistory::className(), ['vehicle_service_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehicle()
    {
        return $this->hasOne(VehicleMaster::className(), ['id' => 'vehicle_id']);
    }
}
