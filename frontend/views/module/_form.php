<?php

use common\models\Course;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Module $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="module-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php $courses = ArrayHelper::map(Course::find()->all(), 'id', 'title'); ?>

    <?= $form->field($model, 'course_id')->dropDownList($courses, ['prompt' => 'Курс таңдаңыз'])->label(false) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true, 'placeholder' => 'Атауы'])->label(false) ?>

    <?= $form->field($model, 'file')->fileInput()->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Сақтау'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
