<?php

use backend\models\Companies;
use dosamigos\datepicker\DatePicker;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\fileInput;

/* @var $this yii\web\View */
/* @var $model backend\models\Companies */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="companies-form">


     <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>﻿

    <?= $form->field($model, 'name')->textInput(['rows' => 6]) ?>

    <?= $form->field($model, 'email')->textInput(['rows' => 6]) ?>

    <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>

   <?= $form->field($model, 'file')->fileInput() ?>

    <!-- <?= $form->field($model, 'created_date')->textInput() ?> -->
<!-- <?= $form->field($model, 'hobby[]')->checkboxList([
                        'one' => 'one',
                        'two' => 'two',
                        'three' => 'three',
                        'four' => 'four'], 
                        ['separator' => '']); ?> -->

       <?= DatePicker::widget([
      'model' => $model,
     'attribute' => 'company_start_date',
     'template' => '{addon}{input}',
        'clientOptions' => [
            'autoclose' => true,
            'format' => 'yyyy-mm-dd'
        ]
]);?>                  
    <?= $form->field($model, 'status')->dropDownList([ 'active' => 'Active', 'inactive' => 'Inactive', ], ['prompt' => 'Status']) ?>
 <!----Create Branches For this company ---->
<!-- <?=
 $form->field($model, 'id')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(Companies::find()->all(),'id','name'),
    'language' => 'en',
    'options' => ['placeholder' => 'Select Company'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);
?> -->
    <?= $form->field($branch, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($branch, 'address')->textInput() ?>

   <!--  <?= $form->field($model, 'created_date')->textInput() ?> -->

    <?= $form->field($branch, 'status')->dropDownList([ 'active' => 'Active', 'inactive' => 'Inactive', ], ['prompt' => '']) ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
