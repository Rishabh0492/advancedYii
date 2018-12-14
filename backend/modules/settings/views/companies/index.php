<?php

use dosamigos\datepicker\DatePicker;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\widget;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CompaniesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Companies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="companies-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Companies', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name:ntext',
            'email:ntext',
            'address:ntext',
            'created_date',
            [
                'attribute'=>'company_start_date',
                'value'=>'company_start_date',
                'format'=>'raw',
                'filter'=>DatePicker::widget([
              'model' => $searchModel,
              'attribute' => 'company_start_date',
              'clientOptions' => [
              'autoclose' => true,
              'format' => 'yyyy-m-d'
        ]
           ]),
            ],
            'company_start_date',
            //'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
