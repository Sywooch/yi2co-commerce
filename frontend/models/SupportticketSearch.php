<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\SupportTicket;

/**
 * SupportticketSearch represents the model behind the search form about `common\models\SupportTicket`.
 */
class SupportticketSearch extends SupportTicket
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['support_ticket_id', 'support_ticket_category_id', 'customer_id', 'support_ticket_status'], 'integer'],
            [['date_submit'], 'safe'],
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
        $query = SupportTicket::find();

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
            'support_ticket_id' => $this->support_ticket_id,
            'support_ticket_category_id' => $this->support_ticket_category_id,
            'date_submit' => $this->date_submit,
            'customer_id' => Yii::$app->user->id,
            'support_ticket_status' => $this->support_ticket_status,
        ]);

        return $dataProvider;
    }
}
