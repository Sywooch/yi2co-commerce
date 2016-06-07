<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\BankTransfer;

/**
 * BanktransferSearch represents the model behind the search form about `common\models\BankTransfer`.
 */
class BanktransferSearch extends BankTransfer
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bank_transfer_id'], 'integer'],
            [['bank_transfer_name', 'bank_transfer_account'], 'safe'],
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
        $query = BankTransfer::find();

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
            'bank_transfer_id' => $this->bank_transfer_id,
        ]);

        $query->andFilterWhere(['like', 'bank_transfer_name', $this->bank_transfer_name])
            ->andFilterWhere(['like', 'bank_transfer_account', $this->bank_transfer_account]);

        return $dataProvider;
    }
}
