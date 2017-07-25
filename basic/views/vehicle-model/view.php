<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\VehicleModel */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Vehicle Models', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vehicle-model-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this Vehicle Model?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute'=>'make_id',
                'value'=>$model->make->name
            ],
            'name',
            'engine_size',
            [
                'attribute'=>'bodyType',
                'value'=>$model->bodyType->name
            ],
            'cylinder',
            'passenger_seats',
            [
                'attribute'=>'status',
                'value'=> ($model->status==1)?"ACTIVE":"DISABLED"
            ],
        ],
    ]) ?>

</div>
