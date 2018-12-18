<?php

use yii\grid\CheckboxColumn;
use yii\grid\GridView;
use yii\grid\SerialColumn;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DepartmentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Departments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="departments-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Departments', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,

        'columns' => [
            [
                    'class' => CheckboxColumn::className(),
                    'header'=>'',
                    'checkboxOptions' => ['class'=>'radiobutton']
                ],
            ['class' => 'yii\grid\SerialColumn'],
            
            'name',
           [
                'attribute'=>'branch_id',
                'value'=>'branches.name',
            ],      
             [
                'attribute'=>'company_id',
                'value'=>'company.name',
            ],
            'created_date',
            //'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
