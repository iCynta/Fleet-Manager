<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\VehicleModel;

/**
 * VehicleModelSearch represents the model behind the search form about `app\models\VehicleModel`.
 */
class VehicleModelSearch extends VehicleModel
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'cylinder', 'passenger_seats', 'status'], 'integer'],
            [['name','make_id','body_type'], 'safe'],
            [['engine_size'], 'number'],
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
        $query = VehicleModel::find();
        $query -> joinWith('make');
        $query -> joinWith('bodyType');

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
            'model.id' => $this->id,
            //'make_id' => $this->make_id,
            'engine_size' => $this->engine_size,
            //'body_type' => $this->body_type,
            'cylinder' => $this->cylinder,
            'passenger_seats' => $this->passenger_seats,
            'status' => $this->status,
        ]);
        
        $query->andFilterWhere(['like', 'make.name', $this->make_id]);
        $query->andFilterWhere(['like', 'body_type.name', $this->body_type]);
        $query->andFilterWhere(['like', 'model.name', $this->name]);

        return $dataProvider;
    }
}
