<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Deal;

/**
 * DealSearch represents the model behind the search form about `common\models\Deal`.
 */
class DealSearch extends Deal
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['deal_id', 'deal_category_id'], 'integer'],
            [['deal_name', 'deal_date_start', 'deal_date_end'], 'safe'],
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
        $query = Deal::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'deal_id' => $this->deal_id,
            'deal_date_start' => $this->deal_date_start,
            'deal_date_end' => $this->deal_date_end,
            'deal_category_id' => $this->deal_category_id,
        ]);

        $query->andFilterWhere(['like', 'deal_name', $this->deal_name]);

        return $dataProvider;
    }
}
