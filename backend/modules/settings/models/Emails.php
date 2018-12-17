<?php

namespace backend\modules\settings\models;

use Yii;

/**
 * This is the model class for table "emails".
 *
 * @property int $id
 * @property string $receiver_name
 * @property string $receiver_email
 * @property string $subject
 * @property string $content
 * @property string $attachments
 */
class Emails extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'emails';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['receiver_name', 'receiver_email', 'subject', 'content', 'attachments'], 'required'],
            [['subject', 'content'], 'string'],
            [['receiver_name'], 'string', 'max' => 50],
            [['receiver_email', 'attachments'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'receiver_name' => 'Receiver Name',
            'receiver_email' => 'Receiver Email',
            'subject' => 'Subject',
            'content' => 'Content',
            'attachments' => 'Attachments',
        ];
    }
}