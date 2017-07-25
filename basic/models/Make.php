<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "make".
 *
 * @property integer $id
 * @property string $name
 * @property integer $status
 *
 * @property Model[] $models
 */
class Make extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'make';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['name'], 'string', 'max' => 45],
        ];
    }
    
//    public function relations() 
//    {
//        return array(
//            'status' => array(self::BELONGS_TO, 'Make', 'id'),
//        );
//    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModels()
    {
        return $this->hasMany(Model::className(), ['make_id' => 'id']);
    }
    
    public function getStatus()
    {
        return ($this->status==1)?"ACTIVE":"DISABLED";
    }

}
