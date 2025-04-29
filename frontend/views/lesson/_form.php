<?php

use common\models\Module;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Lesson $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="lesson-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php $modules = ArrayHelper::map(Module::find()->all(), 'id', 'title'); ?>

    <?= $form->field($model, 'module_id')->dropDownList($modules, ['prompt' => 'Модуль таңдаңыз'])->label(false) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'placeholder' => 'Атауы'])->label(false) ?>

    <?= $form->field($model, 'file')->fileInput()->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Сақтау'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
