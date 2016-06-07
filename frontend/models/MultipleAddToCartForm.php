<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

class MultipleAddToCartForm extends Model
{
	public $quantity;
	public $product_options_id;

	public function rules()
	{
		return [
			['quantity', 'required'],
			['quantity', 'integer'],
			['quantity', 'default', 'value' => 1],
		];
	}

	public function attributeLabels()
    {
        return [
            'product_options_id' => 'Option',
        ];
    }
}