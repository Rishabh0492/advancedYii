<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "companies".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $address
 * @property string $created_date
 * @property string $status
 */
class Companies extends \yii\db\ActiveRecord
{
          private $_hobby;
          public $file;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'companies';
    }
 public function getHobbyArray()
      {
           // Initialize it from 'quant' attribute
           if($this->_hoby == null) 
           {
                 $this->_hobby = explode(',', $this->quant);
           }
           return $this->_hobbyArray;
      }

      public function setHobbyArray($value)
      {
           $this->_hobbyArray = $value;
      }
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'address', 'created_date', 'status'], 'required'],
            [['name', 'email', 'address','logo', 'status'], 'string'],
            [['file'], 'file'],
            [['created_date','company_start_date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'address' => 'Address',
            //'hobby' =>'hobby',
            'created_date' => 'Created Date',
            'company_start_date' => 'Company Start Date',
            'status' => 'Status',
            'file' =>'Logo',
        ];
    }
}
