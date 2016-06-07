<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\CouponList;

/**
 * CouponlistSearch represents the model behind the search form about `common\models\CouponList`.
 */
class CouponlistSearch extends CouponList
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['coupon_id', 'customer_id'], 'integer'],
            [['coupon_code'], 'safe'],
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
        $query = CouponList::find();

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
            'customer_id' => Yii::$app->user->id,
        ]);

        $query->andFilterWhere(['like', 'coupon_code', $this->coupon_code]);

        return $dataProvider;
    }
}
