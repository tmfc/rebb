<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RulePair;

/**
 * RulePairSearch represents the model behind the search form of `app\models\RulePair`.
 */
class RulePairSearch extends RulePair
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'scene_id', 'author_id'], 'integer'],
            [['name', 'description', 'entrance_code', 'fail_code', 'success_code', 'created_at', 'updated_at'], 'safe'],
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
        $query = RulePair::find();

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
            'scene_id' => $this->scene_id,
            'author_id' => $this->author_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'entrance_code', $this->entrance_code])
            ->andFilterWhere(['like', 'fail_code', $this->fail_code])
            ->andFilterWhere(['like', 'success_code', $this->success_code]);

        return $dataProvider;
    }
}