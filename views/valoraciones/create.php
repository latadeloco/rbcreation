<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Valoracion */

$this->title = 'Create Valoracion';
$this->params['breadcrumbs'][] = ['label' => 'Valoracions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="valoracion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
