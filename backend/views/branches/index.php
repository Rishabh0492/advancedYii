<?php

use yii\bootstrap\Modal;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\BranchesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Branches';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="branches-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::button('Create Branches', ['value'=>Url::to('index.php?r=branches/create'),'class' => 'btn btn-success','id'=>'modalButton']) ?>
    </p>
<?php
Modal::begin([
         'header'=>'<h4>Branches</h4>',
         'id'   =>'modal',
         'size'=>'modal-lg'

]);
echo "<div id='modalContent'></div>";
Modal::end();
?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'rowOptions' =>function($model){
            if ($model->status == 'inactive') {
                return ['class'=>'danger'];
            }

        },
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute'=>'company_id',
                'value'=>'company.name',
            ],
            //'id',
           //'company.name',
            'name',
            'address',
            'created_date',
            //'status',

            [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{view} {update} {delete}',
            'headerOptions' => ['width' => '20%', 'class' => 'activity-view-link',],        
            'contentOptions' => ['class' => 'padding-left-5px'],
              'buttons' => [
            'view' => function ($url, $model, $key) {
                return Html::a('<span class="glyphicon glyphicon-eye-open"></span>','#', [
                    'id' => 'activity-view-link',
                    'title' => Yii::t('yii', 'View'),
                    'data-toggle' => 'modal',
                    'data-target' => '#activity-modal',
                    'data-id' => $key,
                    'data-pjax' => '0',

                ]);
            },
        ],

        ],
        ],
    ]); ?>
</div>
