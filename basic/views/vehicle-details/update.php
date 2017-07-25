<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\VehicleDetails */

$this->title = 'Update Vehicle Details: ' . $model->vehicle_detail_id;
$this->params['breadcrumbs'][] = ['label' => 'Vehicle Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->vehicle_detail_id, 'url' => ['view', 'id' => $model->vehicle_detail_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="vehicle-details-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
