<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ValoracionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Valoracions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="valoracion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Valoracion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'valoracion',
            'id_libro',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
