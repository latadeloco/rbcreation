<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Valoracion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="valoracion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'valoracion')->textInput() ?>

    <?= $form->field($model, 'id_libro')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
