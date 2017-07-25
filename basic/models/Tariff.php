<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tariff".
 *
 * @property integer $id
 * @property integer $vehicle_id
 * @property string $daily
 * @property string $weekly
 * @property string $monthly
 *
 * @property VehicleMaster $vehicle
 */
class Tariff extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tariff';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vehicle_id'], 'integer'],
            [['daily', 'weekly', 'monthly'], 'number'],
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
            'daily' => 'Daily',
            'weekly' => 'Weekly',
            'monthly' => 'Monthly',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehicle()
    {
        return $this->hasOne(VehicleMaster::className(), ['id' => 'vehicle_id']);
    }
}
