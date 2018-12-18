<?php

use backend\models\Companies;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Branches */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="branches-form">

    <?php $form = ActiveForm::begin(); ?>

   <!--  <?= $form->field($model, 'company_id')->textInput() ?>
    -->
   <!--  <?= $form->field($model, 'company_id')->dropDownList(
          ArrayHelper::map(Companies::find()->all(),'id','name'),
          ['prompt'=>'Select Company']
   ) ?> -->
<?=
$form->field($model, 'company_id')->widget(Select2::classname(), [
    'data' => ArrayHelper::map(Companies::find()->all(),'id','name'),
    'language' => 'en',
    'options' => ['placeholder' => 'Select Company'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);
?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput() ?>

   <!--  <?= $form->field($model, 'created_date')->textInput() ?> -->

    <?= $form->field($model, 'status')->dropDownList([ 'active' => 'Active', 'inactive' => 'Inactive', ], ['prompt' => '']) ?>
    <!----Create Branches For this company ---->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
