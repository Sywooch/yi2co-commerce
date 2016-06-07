<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\OrderList;

/**
 * OrderListSearch represents the model behind the search form about `common\models\OrderList`.
 */
class OrderListSearch extends OrderList
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_list_id', 'product_id', 'product_options_id', 'product_options_price', 'quantity', 'subtotal', 'deal_id', 'deal_category_id', 'deal_discount', 'deal_quantity', 'deal_quantity_threeshold', 'coupon_id', 'coupon_discount'], 'integer'],
            [['order_code', 'product_options_name', 'coupon_code'], 'safe'],
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
        $query = OrderList::find();

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
            'order_list_id' => $this->order_list_id,
            'product_id' => $this->product_id,
            'product_options_id' => $this->product_options_id,
            'product_options_price' => $this->product_options_price,
            'quantity' => $this->quantity,
            'subtotal' => $this->subtotal,
            'deal_id' => $this->deal_id,
            'deal_category_id' => $this->deal_category_id,
            'deal_discount' => $this->deal_discount,
            'deal_quantity' => $this->deal_quantity,
            'deal_quantity_threeshold' => $this->deal_quantity_threeshold,
            'coupon_id' => $this->coupon_id,
            'coupon_discount' => $this->coupon_discount,
        ]);

        $query->andFilterWhere(['like', 'order_code', $this->order_code])
            ->andFilterWhere(['like', 'product_options_name', $this->product_options_name])
            ->andFilterWhere(['like', 'coupon_code', $this->coupon_code]);

        return $dataProvider;
    }
}
