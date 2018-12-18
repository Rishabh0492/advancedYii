<?php

namespace backend\models;

use Yii;
use backend\models\Branches;

/**
 * This is the model class for table "departments".
 *
 * @property int $id
 * @property int $branch_id
 * @property string $name
 * @property int $company_id
 * @property string $created_date
 * @property string $status
 */
class Departments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'departments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['branch_id', 'name', 'company_id', 'created_date', 'status'], 'required'],
            [['branch_id', 'company_id'], 'integer'],
            [['name', 'status'], 'string'],
            [['created_date'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'branch_id' => 'Branch Name',
            'name' => 'Name',
            'company_id' => 'Companies Name',
           //'created_date' => 'Created Date',
            'status' => 'Status',
        ];
    }
    public function getBranches()
    {
      return $this->hasOne(Branches::className(),['id'=>'branch_id']);
    }
    public function getCompany()
    {
      return $this->hasOne(Companies::className(),['id'=>'company_id']);
    }

}
