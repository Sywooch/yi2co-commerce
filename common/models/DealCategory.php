<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "deal_category".
 *
 * @property integer $deal_category_id
 * @property string $deal_category_name
 * @property string $deal_category_description
 *
 * @property Deal[] $deals
 */
class DealCategory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'deal_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['deal_category_name', 'deal_category_description'], 'required'],
            [['deal_category_description'], 'string'],
            [['deal_category_name'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'deal_category_id' => 'Deal Category ID',
            'deal_category_name' => 'Deal Category Name',
            'deal_category_description' => 'Deal Category Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDeals()
    {
        return $this->hasMany(Deal::className(), ['deal_category_id' => 'deal_category_id']);
    }
}
