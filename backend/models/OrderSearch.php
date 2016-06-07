<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Order;

/**
 * OrderSearch represents the model behind the search form about `common\models\Order`.
 */
class OrderSearch extends Order
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_code', 'order_date'], 'safe'],
            [['payment_status', 'order_status', 'coupon_id', 'delivery_address_id', 'customer_id'], 'integer'],
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
        $query = Order::find();

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
            'order_date' => $this->order_date,
            'payment_status' => $this->payment_status,
            'order_status' => $this->order_status,
            'coupon_id' => $this->coupon_id,
            'delivery_address_id' => $this->delivery_address_id,
            'customer_id' => $this->customer_id,
        ]);

        $query->andFilterWhere(['like', 'order_code', $this->order_code]);

        return $dataProvider;
    }
}
