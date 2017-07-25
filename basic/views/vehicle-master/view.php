<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\VehicleMaster */

$this->title = $model->model->name ." [".$model->plate_code." ".$model->plate_number."]";
$this->params['breadcrumbs'][] = ['label' => 'Vehicle Masters', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehicle-master-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute'=>'model_id',
                'value'=>$model->model->name
            ],
            'plate_code',
            'plate_number',
            'vin_number',
            [
                'attribute'=>'status',
                'value'=> ($model->status==1)?"ACTIVE":"DISABLED"
            ],
        ],
    ]) ?>

</div>
