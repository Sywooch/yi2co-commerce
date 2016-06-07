<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\DeliveryAddress;

/**
 * DeliveryaddressSearch represents the model behind the search form about `common\models\DeliveryAddress`.
 */
class DeliveryaddressSearch extends DeliveryAddress
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['delivery_address_id', 'customer_id', 'city_id'], 'integer'],
            [['delivery_address_name', 'delivery_address_address'], 'safe'],
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
        $query = DeliveryAddress::find();

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
            'delivery_address_id' => $this->delivery_address_id,
            'customer_id' => $this->customer_id,
            'city_id' => $this->city_id,
        ]);

        $query->andFilterWhere(['like', 'delivery_address_name', $this->delivery_address_name])
            ->andFilterWhere(['like', 'delivery_address_address', $this->delivery_address_address]);

        return $dataProvider;
    }
}
