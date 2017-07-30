<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Valoracion */

$this->title = 'Update Valoracion: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Valoracions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="valoracion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
