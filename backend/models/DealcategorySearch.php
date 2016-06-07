<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\DealCategory;

/**
 * DealcategorySearch represents the model behind the search form about `common\models\DealCategory`.
 */
class DealcategorySearch extends DealCategory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['deal_category_id'], 'integer'],
            [['deal_category_name', 'deal_category_description'], 'safe'],
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
        $query = DealCategory::find();

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
            'deal_category_id' => $this->deal_category_id,
        ]);

        $query->andFilterWhere(['like', 'deal_category_name', $this->deal_category_name])
            ->andFilterWhere(['like', 'deal_category_description', $this->deal_category_description]);

        return $dataProvider;
    }
}
