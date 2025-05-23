<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\models\Admin;
use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header>
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar navbar-expand navbar-light bg-light fixed-top shadow-sm',
        ],
    ]);
    $menuItems = [];

    if (Admin::find()->andWhere(['user_id' => Yii::$app->user->id])->exists()) {
        $menuItems = [
            ['label' => 'Қатысушылар', 'url' => ['/participant/index']],
            ['label' => 'Курстар', 'url' => ['/course/index']],
            ['label' => 'Модульдер', 'url' => ['/module/index']],
            ['label' => 'Сабақтар', 'url' => ['/lesson/index']],
            ['label' => 'Кітаптар', 'url' => ['/book/index']],
        ];
    }

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav me-auto mb-md-0'],
        'items' => $menuItems,
    ]);
    if (Yii::$app->user->isGuest) {
        echo Html::tag('div',Html::a('Тіркелу',['/site/signup'],['class' => ['btn btn-link login text-decoration-none']]),['class' => ['d-flex']]);
        echo Html::tag('div',Html::a('Кіру',['/site/login'],['class' => ['btn btn-link login text-decoration-none']]),['class' => ['d-flex']]);
    } else {
        echo Html::beginForm(['/site/logout'], 'post', ['class' => 'd-flex'])
            . Html::submitButton(
                'Шығу (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link text-danger text-decoration-none']
            )
            . Html::endForm();
    }
    NavBar::end();
    ?>
</header>

<main role="main" class="flex-shrink-0">
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</main>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage();
