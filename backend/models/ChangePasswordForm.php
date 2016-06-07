<?php
namespace backend\models;

use common\models\User;
use yii\base\Model;
use Yii;

class ChangePasswordForm extends Model
{
	public $newPassword;

	public $oldPassword;

	public $comparePassword;


	public function rules()
	{
		return[
			[['newPassword', 'oldPassword', 'comparePassword'], 'required'],
			['oldPassword', 'findPassword'],
			['comparePassword', 'compare', 'compareAttribute' => 'newPassword'],
		];
	}

	public function findPassword($attribute, $params) {
		$user = User::find()->where([
			'username' => Yii::$app->user->identity->username
		])->one();
		$password = $user->password_hash;

		if(!$user->validatePassword($this->oldPassword)){
			$this->addError($attribute, 'Old Password is incorrect');
		}
	}

	public function attributeLabels() {
		return [
			'oldPassword' => 'Old Password',
			'newPassword' => 'New Password',
			'comparePassword' => 'Repeat New Password',
		];
	}
}