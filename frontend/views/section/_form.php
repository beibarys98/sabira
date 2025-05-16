<?php

use common\models\Lesson;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Section $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="section-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php $modules = ArrayHelper::map(Lesson::find()->all(), 'id', 'title'); ?>

    <?= $form->field($model, 'lesson_id')->dropDownList($modules, ['prompt' => 'Сабақ таңдаңыз'])->label(false) ?>

    <?= $form->field($model, 'type')->dropDownList([
        'youtube' => 'YouTube',
        'file' => 'Файл',
        'task' => 'Тапсырма',
    ], [
        'prompt' => 'Түрін таңдаңыз',
        'id' => 'section-type',
    ])->label(false) ?>

    <div id="field-link">
        <?= $form->field($model, 'link')->textInput(['maxlength' => true, 'placeholder' => 'YouTube сілтеме'])->label(false) ?>
    </div>

    <div id="field-file">
        <?= $form->field($model, 'file')->fileInput()->label(false) ?>
    </div>

    <div id="field-task">
        <?= $form->field($model, 'task')->textarea(['rows' => 6, 'placeholder' => 'Тапсырма'])->label(false) ?>
    </div>


    <div class="form-group">
        <?= Html::submitButton('Сақтау', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
$js = <<<JS
function toggleFields() {
    var type = $('#section-type').val();
    $('#field-link').toggle(type === 'youtube');
    $('#field-file').toggle(type === 'file');
    $('#field-task').toggle(type === 'task');
}

$('#section-type').on('change', toggleFields);

// Call once on page load in case editing existing record
toggleFields();
JS;

$this->registerJs($js);
?>
