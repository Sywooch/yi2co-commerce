<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\ProductOptions;

/**
 * ProductoptionsSearch represents the model behind the search form about `common\models\ProductOptions`.
 */
class ProductoptionsSearch extends ProductOptions
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_options_id', 'product_id', 'product_options_price', 'product_options_tier'], 'integer'],
            [['product_options_name', 'product_options_description'], 'safe'],
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
        $query = ProductOptions::find()->where(['not',['product_options_name' => "default"]]);

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
            'product_options_id' => $this->product_options_id,
            'product_id' => $this->product_id,
            'product_options_price' => $this->product_options_price,
            'product_options_tier' => $this->product_options_tier,
        ]);

        $query->andFilterWhere(['like', 'product_options_name', $this->product_options_name])
            ->andFilterWhere(['like', 'product_options_description', $this->product_options_description]);

        return $dataProvider;
    }
}
