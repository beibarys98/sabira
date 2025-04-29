<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Course $model */

$this->title = Yii::t('app', 'Курс өзгерту');
?>
<div class="course-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <hr>
    <br>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
