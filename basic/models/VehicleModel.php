<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "model".
 *
 * @property integer $id
 * @property integer $make_id
 * @property string $name
 * @property string $engine_size
 * @property integer $body_type
 * @property integer $cylinder
 * @property integer $passenger_seats
 * @property integer $status
 *
 * @property BodyType $bodyType
 * @property Make $make
 * @property VehicleMaster[] $vehicleMasters
 */
class VehicleModel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'model';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cylinder', 'passenger_seats',], 'integer'],
            [['engine_size'], 'number'],
            [['name','make_id', 'body_type','engine_size','passenger_seats','cylinder'], 'required'],
            [['make_id', 'body_type'], 'safe'],
            
            [['name'], 'string', 'max' => 45],
            [['body_type'], 'exist', 'skipOnError' => true, 'targetClass' => BodyType::className(), 'targetAttribute' => ['body_type' => 'id']],
            [['make_id'], 'exist', 'skipOnError' => true, 'targetClass' => Make::className(), 'targetAttribute' => ['make_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'make_id' => 'Vehicle Make',
            'name' => 'Model Name',
            'engine_size' => 'Engine Size (L)',
            'body_type' => 'Body Type',
            'cylinder' => 'No.Cylinder',
            'passenger_seats' => 'Number Of Passenger Seats',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBodyType()
    {
        return $this->hasOne(BodyType::className(), ['id' => 'body_type']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMake()
    {
        return $this->hasOne(Make::className(), ['id' => 'make_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVehicleMasters()
    {
        return $this->hasMany(VehicleMaster::className(), ['model_id' => 'id']);
    }
    
    public function getStatus()
    {
        return ($this->status==1)?"ACTIVE":"DISABLED";
    }
}
