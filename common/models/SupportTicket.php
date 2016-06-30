<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "support_ticket".
 *
 * @property integer $support_ticket_id
 * @property integer $support_ticket_category_id
 * @property string $issue
 * @property string $date_submit
 * @property integer $customer_id
 * @property integer $support_ticket_status
 *
 * @property Customer $customer
 * @property SupportTicketCategory $supportTicketCategory
 * @property SupportTicketMessage[] $supportTicketMessages
 */
class SupportTicket extends \yii\db\ActiveRecord
{
    const SUPPORT_STATUS_CLOSED = 0;
    const SUPPORT_STATUS_OPEN = 10;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'support_ticket';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['support_ticket_category_id', 'issue', 'customer_id'], 'required'],
            [['support_ticket_category_id', 'customer_id', 'support_ticket_status', 'notification'], 'integer'],
            [['date_submit'], 'safe'],
            [['issue'], 'string', 'max' => 64]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'support_ticket_id' => 'Support Ticket ID',
            'support_ticket_category_id' => 'Support Ticket Category ID',
            'issue' => 'Issue',
            'date_submit' => 'Date Submit',
            'customer_id' => 'Customer ID',
            'support_ticket_status' => 'Support Ticket Status',
            'notification' => 'Notification'
        ];
    }

    public function formatSupportstatus() {
        if ($this->support_ticket_status == 0)
            return "Closed";
        else if
            ($this->support_ticket_status == 10)
            return "Open";
        else
            return "Not Set";
    }

    /*public function checkNotification() {
        $notification = SupportTicket::find()->where('notification' == 0)->one();
        
        return count($notification);
        count(common\models\SupportTicket::find()->where('notification' == 0)->all());
    }*/

    /*public static function getNotification() {
        $notification = SupportTicket::find()->where('notification' == 0)->all();
        $notif=0;
        foreach($notification as $model){
            $notif = $notif + 1;
        }
        return $notif;
    }*/

    public static function getNotification() {
        $sql = "SELECT * FROM support_ticket WHERE notification = 0";
        $db = Yii::$app->db;
        $command = $db -> createCommand($sql);
        $results = $command->queryAll();
        $i=1;
        $count=0;
        foreach($results as $model){
            $count = $count + 1;
            $i++;
        }
        return $count;
    }

    public function formatNotification() {
        if ($this->notification == 0)
            return "Not Read";
        else if
            ($this->notification == 10)
            return "Read";
        else
            return "Not Set";
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::className(), ['customer_id' => 'customer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupportTicketCategory()
    {
        return $this->hasOne(SupportTicketCategory::className(), ['support_ticket_category_id' => 'support_ticket_category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSupportTicketMessages()
    {
        return $this->hasMany(SupportTicketMessage::className(), ['support_ticket_id' => 'support_ticket_id']);
    }
}
