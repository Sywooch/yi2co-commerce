<?php
namespace frontend\models;

use common\models\Customer;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $customer_name;
    public $customer_dob;
    public $customer_gender;
    public $customer_telephone;
    public $customer_address;
    public $customer_reward_point;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_name', 'customer_gender', 'customer_telephone', 'customer_dob'], 'required'],
            ['customer_address', 'string'],
            ['customer_name', 'string', 'max' => 64],
            ['customer_telephone', 'string', 'max' => 20],

            ['username', 'filter', 'filter' => 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\Customer', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\Customer', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new Customer();
        $user->customer_name = $this->customer_name;
        $user->customer_dob = $this->customer_dob;
        $user->customer_gender = $this->customer_gender;
        $user->customer_telephone = $this->customer_telephone;
        $user->customer_address = $this->customer_address;

        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }
}
