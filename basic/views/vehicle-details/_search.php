<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\VehicleDetailsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="vehicle-details-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'vehicle_detail_id') ?>

    <?= $form->field($model, 'vehicle_id') ?>

    <?= $form->field($model, 'model_year') ?>

    <?= $form->field($model, 'trim_id') ?>

    <?= $form->field($model, 'color') ?>

    <?php // echo $form->field($model, 'picture') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
