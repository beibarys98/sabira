<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Lesson $model */

$this->title = Yii::t('app', 'Сабақ өзгерту');
?>
<div class="lesson-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <hr>
    <br>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
