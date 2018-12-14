<?php

namespace backend\modules\settings\models;

use Yii;

/**
 * This is the model class for table "companies".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $address
 * @property int $company_start_date
 * @property string $created_date
 * @property string $status
 * @property string $hobby
 */
class Companies extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public $file;

    public static function tableName()
    {
        return 'companies';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'email', 'address', 'company_start_date', 'created_date', 'status'], 'required'],
            [['name', 'email', 'address', 'status','logo' 'hobby'], 'string'],
            [['file'], 'file'],
            [['company_start_date'], 'integer'],
            [['created_date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'address' => 'Address',
            'company_start_date' => 'Company Start Date',
            'created_date' => 'Created Date',
            'status' => 'Status',
            'file' => 'Logo',
        ];
    }
}
