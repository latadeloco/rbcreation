<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\bootstrap\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Html::img('images/logotipo.png', [
            'width' => 150,
            'height' => 35,
        ]),
        'options' => [
            'class' => 'navbar-default navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            Yii::$app->user->isGuest ? (
                [
                    'label' => 'Inicia sesión o regístrate',
                    'items' => [
                        ['label' => 'Iniciar sesión', 'url' => ['/site/login']],
                        ['label' => 'Registrarse', 'url' => ['/usuarios/create']],
                    ],
                ]
            ) : (
                [
                    'label' => '¡Bienvenido, ' . Yii::$app->user->identity->nombre . '!',
                    'items' => [
                        [ 'label' => 'Registros', 'url' => ['/site/about']],
                        [ 'label' => 'Otra cosa ', 'url' => ['/site/error']],
                        [ 'label' => 'Cerrar sesión',
                            'url' => ['site/logout'],
                            'linkOptions' => ['data-method' => 'POST']],
                    ],
                ]
            )
        ],
    ]); ?>
    <div class="row">
        <div class="col-md-5 col-md-offset-2">
            <form class="navbar-form">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Buscar">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php NavBar::end() ?>
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Rental & Book Creation <?= date('Y') ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
