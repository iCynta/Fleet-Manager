<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Trim */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="trim-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?= $form->field($model, 'model_id')->dropDownList(ArrayHelper::map(\app\models\VehicleModel::find()
            ->select('id,name')
            ->all(), 'id', 'name'),['prompt'=>'--Select Model--']) ?>
    
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
