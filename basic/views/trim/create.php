<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Trim */

$this->title = 'Create Trim';
$this->params['breadcrumbs'][] = ['label' => 'Trims', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="trim-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
