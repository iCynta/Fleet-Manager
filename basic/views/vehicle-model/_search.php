<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VehicleModelSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vehicle-model-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'make_id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'engine_size') ?>

    <?= $form->field($model, 'body_type') ?>

    <?php // echo $form->field($model, 'cylinder') ?>

    <?php // echo $form->field($model, 'passenger_seats') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
