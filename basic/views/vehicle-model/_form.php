<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\VehicleModel */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vehicle-model-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'make_id')->dropDownList(ArrayHelper::map(app\models\Make::find()->all(), 'id', 'name'),['prompt'=>'--Select Make--']) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'engine_size')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'body_type')->dropDownList(ArrayHelper::map(\app\models\BodyType::find()->all(),'id', 'name'),['prompt'=>'--Select Body Type--']) ?>

    <?= $form->field($model, 'cylinder')->textInput() ?>

    <?= $form->field($model, 'passenger_seats')->textInput() ?>

    <?= $form->field($model, 'status')->dropDownList(array('1'=>'ACTIVE','0'=>'DISABLED'),
            [
                'options' =>   [$status => ['selected' => true]]
            ]

            ); 
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
