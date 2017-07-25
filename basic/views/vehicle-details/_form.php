<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\VehicleDetails */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vehicle-details-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'vehicle_id')->dropDownList(ArrayHelper::map(\app\models\VehicleMaster::find()
            ->select('id, plate_number')
            ->all(), 'id', 'plate_number')) 
    ?>

    <?= $form->field($model, 'model_year')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'trim_id')->dropDownList(ArrayHelper::map($model->trim, 'id', 'name')) ?>

    <?= $form->field($model, 'color')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'picture')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
