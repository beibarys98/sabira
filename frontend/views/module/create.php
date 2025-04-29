<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Module $model */

$this->title = Yii::t('app', 'Модуль қосу');
?>
<div class="module-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <hr>
    <br>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
