<?php

namespace backend\modules\settings\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\settings\models\Companies;

/**
 * CompaniesSearch represents the model behind the search form of `backend\modules\settings\models\Companies`.
 */
class CompaniesSearch extends Companies
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'company_start_date'], 'integer'],
            [['name', 'email', 'address', 'created_date', 'status', 'hobby'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Companies::find();

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
            'company_start_date' => $this->company_start_date,
            'created_date' => $this->created_date,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'hobby', $this->hobby]);

        return $dataProvider;
    }
}
