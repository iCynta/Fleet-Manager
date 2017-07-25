<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\VehicleMaster;

/**
 * VehicleMasterSearch represents the model behind the search form about `app\models\VehicleMaster`.
 */
class VehicleMasterSearch extends VehicleMaster
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['plate_code', 'plate_number', 'vin_number','model_id'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = VehicleMaster::find();
        $query->joinWith('model');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            //'model_id' => $this->model_id,
            'status' => $this->status,
        ]);

        $query->andFilterWhere(['like', 'vehicle_master.plate_code', $this->plate_code])
            ->andFilterWhere(['like', 'vehicle_master.plate_number', $this->plate_number])
            ->andFilterWhere(['like', 'model.name', $this->model_id])
            ->andFilterWhere(['like', 'vehicle_master.vin_number', $this->vin_number]);

        return $dataProvider;
    }
}
