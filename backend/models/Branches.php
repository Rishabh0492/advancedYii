<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "branches".
 *
 * @property int $id
 * @property int $company_id
 * @property string $name
 * @property int $address
 * @property string $created_date
 * @property string $status
 */
class Branches extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'branches';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['company_id', 'name', 'address', 'created_date', 'status'], 'required'],
            [['address'], 'string'],
            //[['created_date'], 'safe'],
            [['status'], 'string'],
            [['name'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'company_id' => 'Company Name',
            'name' => 'Branch Name',
            'address' => 'Address',
            //'created_date' => 'Created Date',
            'status' => 'Status',
        ];
    }

    public function getCompany()
    {
      return $this->hasOne(Companies::className(),['id'=>'company_id']);
    }

    public function getDepartments()
    {
      return $this->hasOne(Departments::className(),['branch_id'=>'id']);
    }
}
