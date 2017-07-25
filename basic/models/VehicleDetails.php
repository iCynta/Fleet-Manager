<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vehicle_details".
 *
 * @property integer $vehicle_detail_id
 * @property integer $vehicle_id
 * @property string $model_year
 * @property integer $trim_id
 * @property string $color
 * @property string $picture
 *
 * @property Trim $trim
 * @property VehicleMaster $vehicle
 */
class VehicleDetails extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vehicle_details';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vehicle_id', 'trim_id'], 'integer'],
            [['model_year'], 'safe'],
            [['color'], 'string', 'max' => 45],
            [['picture'], 'string', 'max' => 100],
            [['trim_id'], 'exist', 'skipOnError' => true, 'targetClass' => Trim::className(), 'targetAttribute' => ['trim_id' => 'id']],
            [['vehicle_id'], 'exist', 'skipOnError' => true, 'targetClass' => VehicleMaster::className(), 'targetAttribute' => ['vehicle_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'vehicle_detail_id' => 'Vehicle Detail ID',
            'vehicle_id' => 'Vehicle ID',
            'model_year' => 'Model Year',
            'trim_id' => 'Trim ID',
            'color' => 'Color',
            'picture' => 'Picture',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTrim()
    {
        return $this->hasOne(Trim::className(), ['id' => 'trim_id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehicle()
    {
        return $this->hasOne(VehicleMaster::className(), ['id' => 'vehicle_id']);
    }
}
