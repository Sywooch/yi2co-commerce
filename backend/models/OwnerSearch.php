<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Owner;

/**
 * OwnerSearch represents the model behind the search form about `common\models\Owner`.
 */
class OwnerSearch extends Owner
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['owner_id', 'created_at', 'updated_at'], 'integer'],
            [['owner_name', 'owner_photo', 'owner_username', 'last_login_time', 'owner_auth_key', 'owner_password_hash', 'owner_password_reset_token'], 'safe'],
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
        $query = Owner::find();

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
            'owner_id' => $this->owner_id,
            'last_login_time' => $this->last_login_time,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'owner_name', $this->owner_name])
            ->andFilterWhere(['like', 'owner_photo', $this->owner_photo])
            ->andFilterWhere(['like', 'owner_username', $this->owner_username])
            ->andFilterWhere(['like', 'owner_auth_key', $this->owner_auth_key])
            ->andFilterWhere(['like', 'owner_password_hash', $this->owner_password_hash])
            ->andFilterWhere(['like', 'owner_password_reset_token', $this->owner_password_reset_token]);

        return $dataProvider;
    }
}
