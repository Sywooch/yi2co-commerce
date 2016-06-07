<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\SupportTicketMessage;

/**
 * SupportticketmessageSearch represents the model behind the search form about `common\models\SupportTicketMessage`.
 */
class SupportticketmessageSearch extends SupportTicketMessage
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['support_ticket_message_id', 'support_ticket_id', 'customer_id', 'admin_id'], 'integer'],
            [['message', 'date_submit'], 'safe'],
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
        $query = SupportTicketMessage::find();

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
            'support_ticket_message_id' => $this->support_ticket_message_id,
            'support_ticket_id' => $this->support_ticket_id,
            'customer_id' => $this->customer_id,
            'admin_id' => $this->admin_id,
            'date_submit' => $this->date_submit,
        ]);

        $query->andFilterWhere(['like', 'message', $this->message]);

        return $dataProvider;
    }
}
