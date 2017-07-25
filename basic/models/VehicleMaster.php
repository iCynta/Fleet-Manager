<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vehicle_master".
 *
 * @property integer $id
 * @property integer $model_id
 * @property string $plate_code
 * @property string $plate_number
 * @property string $vin_number
 * @property integer $status
 *
 * @property Tariff[] $tariffs
 * @property VehicleDetails[] $vehicleDetails
 * @property Model $model
 * @property VehicleService[] $vehicleServices
 */
class VehicleMaster extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vehicle_master';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['model_id', 'status'], 'integer'],
            [['plate_code'], 'string', 'max' => 10],
            [['plate_number', 'vin_number'], 'string', 'max' => 45],
            [['model_id'], 'exist', 'skipOnError' => true, 'targetClass' => VehicleModel::className(), 'targetAttribute' => ['model_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'model_id' => 'Model ID',
            'plate_code' => 'Plate Code',
            'plate_number' => 'Plate Number',
            'vin_number' => 'Vin Number',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTariffs()
    {
        return $this->hasMany(Tariff::className(), ['vehicle_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehicleDetails()
    {
        return $this->hasMany(VehicleDetails::className(), ['vehicle_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModel()
    {
        return $this->hasOne(VehicleModel::className(), ['id' => 'model_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehicleServices()
    {
        return $this->hasMany(VehicleService::className(), ['vehicle_id' => 'id']);
    }
}
