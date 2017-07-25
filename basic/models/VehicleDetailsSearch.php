<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\VehicleDetails;

/**
 * VehicleDetailsSearch represents the model behind the search form about `app\models\VehicleDetails`.
 */
class VehicleDetailsSearch extends VehicleDetails
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['vehicle_detail_id', 'trim_id'], 'integer'],
            [[ 'vehicle_id'],'required'],
            [['model_year', 'color', 'picture'], 'safe'],
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
        $query = VehicleDetails::find();

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
            'vehicle_detail_id' => $this->vehicle_detail_id,
            'vehicle_id' => $this->vehicle_id,
            'model_year' => $this->model_year,
            'trim_id' => $this->trim_id,
        ]);

        $query->andFilterWhere(['like', 'color', $this->color])
            ->andFilterWhere(['like', 'picture', $this->picture]);

        return $dataProvider;
    }
}
