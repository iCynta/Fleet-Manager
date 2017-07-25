<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "trim".
 *
 * @property integer $id
 * @property string $name
 * @property integer $model_id
 *
 * @property Model $model
 * @property VehicleDetails[] $vehicleDetails
 */
class Trim extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'trim';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['model_id'], 'integer'],
            [['name'], 'string', 'max' => 45],
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
            'name' => 'Name',
            'model_id' => 'Model ID',
        ];
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
    public function getVehicleDetails()
    {
        return $this->hasMany(VehicleDetails::className(), ['trim_id' => 'id']);
    }
}
