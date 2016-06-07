<?php
namespace frontend\models;

use common\models\Customer;
use yii\base\Model;
use Yii;

class ChangeInfoForm extends Model
{
	public $customer_name;
	public $customer_dob;
	public $customer_gender;
	public $customer_telephone;
	public $customer_address;

	public function rules()
	{
		return [
			[['customer_name', 'customer_dob', 'customer_gender', 'customer_telephone', 'customer_address'], 'required'],
			['customer_address', 'string'],
			['customer_name', 'string', 'max' => 64],
			['customer_telephone', 'string', 'max' => 20],
		];
	}

	public function attributeLabels() {
		return [
			'customer_name' => 'Name',
			'customer_dob' => 'Date of Birth',
			'customer_gender' => 'Gender',
			'customer_telephone' => 'Telephone',
			'customer_address' => 'Address',
		];
	}
}