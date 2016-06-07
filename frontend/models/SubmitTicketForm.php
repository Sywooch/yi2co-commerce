<?php
namespace frontend\models;

use common\models\SupportTicket;
use common\models\SupportTicketMessage;
use yii\base\Model;
use yii\db\Expression;
use Yii;

class SubmitTicketForm extends Model
{
	public $support_ticket_category_id;
	public $issue;
	public $message;

	public function rules()
	{
		return [
			[['support_ticket_category_id', 'issue', 'message'], 'required'],
			[['message', 'issue'], 'string'],
		];
	}

	public function attributeLabels() {
		return [
			'support_ticket_category_id' => 'Category',
			'message' => 'Message',
			'issue' => 'Issue',
		];
	}

	public function submit()
	{
		if (!$this->validate()) {
			return null;
		}

		$ticket = new SupportTicket();
		$message = new SupportTicketMessage();

		$ticket->customer_id = Yii::$app->user->id;
		$ticket->support_ticket_category_id = $this->support_ticket_category_id;
		$ticket->issue = $this->issue;
		$ticket->date_submit = new Expression('NOW()');

		$message->
	}
}