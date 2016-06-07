<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\SupportTicketCategory;

/**
 * SupportticketcategorySearch represents the model behind the search form about `common\models\SupportTicketCategory`.
 */
class SupportticketcategorySearch extends SupportTicketCategory
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['support_ticket_category_id'], 'integer'],
            [['support_ticket_category_name'], 'safe'],
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
        $query = SupportTicketCategory::find();

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
            'support_ticket_category_id' => $this->support_ticket_category_id,
        ]);

        $query->andFilterWhere(['like', 'support_ticket_category_name', $this->support_ticket_category_name]);

        return $dataProvider;
    }
}
