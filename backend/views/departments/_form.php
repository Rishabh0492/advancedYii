<?php

use backend\models\Branches;
use backend\models\Companies;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Departments */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="departments-form">

    <?php $form = ActiveForm::begin(); ?>


       <?= $form->field($model,'company_id')->dropDownList(
        ArrayHelper::map(Companies::find()->all(),'id','name'),
        [
          'prompt'=>'Select Company',
          'onchange'=>'
            $.post("index.php?r=branches/lists&id='.'"+$(this).val(),function(data){
            $("select#departments-id").html(data);
            }); '
        ]);  ?>

        
         <?= $form->field($model,'id')->dropDownList(
         ArrayHelper::map(Branches::find()->all(),'id','name'),
        [
          'prompt'=>'Select Branch',
          'onchange'=>'
            '
        ])->label('Branch Name');  ?>

    <!-- <?= $form->field($model,'branch_id')->dropDownList(
        ArrayHelper::map(Branches::find()->all(),'id','name')
    )    ?> -->

    <?= $form->field($model, 'name')->textarea(['rows' => 6]) ?>

  <!--  <?= $form->field($model,'company_id')->dropDownList(
       ArrayHelper::map(Companies::find()->all(),'id','name')
   )    ?> -->
  
    <?= $form->field($model, 'status')->dropDownList([ 'active' => 'Active', 'inactive' => 'Inactive', ], ['prompt' => '']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
