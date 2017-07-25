<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "model_trim".
 *
 * @property integer $id
 * @property integer $model
 * @property string $name
 *
 * @property Model[] $models
 */
class ModelTrim extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'model_trim';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['model','name'], 'required'],
            [['name'], 'safe'],
            [['name'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'model' => 'Model',
            'name' => 'Name',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModels()
    {
        return $this->hasMany(Model::className(), ['trim_id' => 'id']);
    }
}
