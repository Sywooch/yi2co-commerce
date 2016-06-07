<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Coupon;

/**
 * CouponSearch represents the model behind the search form about `common\models\Coupon`.
 */
class CouponSearch extends Coupon
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['coupon_id', 'coupon_total', 'coupon_used', 'redeem_point', 'coupon_status'], 'integer'],
            [['coupon_discount'], 'number'],
            [[/*'coupon_date_start', 'coupon_date_end', */'coupon_name'], 'safe'],
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
        $query = Coupon::find();

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
            'coupon_id' => $this->coupon_id,
            'coupon_discount' => $this->coupon_discount,
            'coupon_total' => $this->coupon_total,
            'coupon_used' => $this->coupon_used,
            'coupon_date_start' => $this->coupon_date_start,
            'coupon_date_end' => $this->coupon_date_end,
            'coupon_status' => $this->coupon_status,
            'redeem_point' => $this->redeem_point,
        ]);

        $query->andFilterWhere(['like', 'coupon_name', $this->coupon_name]);

        return $dataProvider;
    }
}
