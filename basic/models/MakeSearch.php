<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Make;

/**
 * MakeSearch represents the model behind the search form about `app\models\Make`.
 */
class MakeSearch extends Make
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['name','status'], 'safe'],
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
        $query = Make::find();
        //$query->joinWith('status');
        //$query =>  join('Make.status');

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
        if(strtoupper($this->status)=='DISABLED')
            $status = 0;
        else if(strtoupper($this->status)=='ACTIVE')
            $status = 1;
        else
            $status = '';
        $query->andFilterWhere([
            'id' => $this->id,
            'status' => $status,
        ]);
        //$query->andFilterWhere(['like', 'Make.status', $this->status]);

        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
