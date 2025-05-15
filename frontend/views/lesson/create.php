<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Lesson $model */

$this->title = Yii::t('app', 'Сабақ қосу');
?>
<div class="lesson-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <hr>
    <br>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
