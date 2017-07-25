<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\VehicleMaster */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vehicle-master-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'model_id')->dropDownList(ArrayHelper::map(\app\models\VehicleModel::find()
            ->select(['id','name'])
            ->where("status <> 0")->all()
            , 'id', 'name')) ?>

    <?= $form->field($model, 'plate_code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'plate_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'vin_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList(array('1'=>'ACTIVE','0'=>'DISABLED'))?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
