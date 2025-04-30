<?php

use common\models\Participant;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var common\models\search\CourseSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Курстар');

?>
<div class="course-index container">

    <h1><?= Html::encode($this->title) ?></h1>

    <hr>
    <br>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php foreach ($dataProvider->getModels() as $model): ?>
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <img
                            src="<?= $model->img_path ? Yii::getAlias('@web') . '/' . $model->img_path : Yii::getAlias('@web/images/img.jpg') ?>"
                            class="card-img-top"
                            alt="<?= Html::encode($model->title) ?>"
                            style="object-fit: cover; height: 200px;"
                    >

                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?= Html::encode($model->title) ?></h5>
                        <?php
                        $isParticipant = !Yii::$app->user->isGuest && Participant::find()
                                ->andWhere(['user_id' => Yii::$app->user->id, 'course_id' => $model->id])
                                ->exists();
                        ?>

                        <div class="mt-auto text-center">
                            <?php if ($isParticipant): ?>
                                <?= Html::a(Yii::t('app', 'Қарау'), ['view2', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
                            <?php else: ?>
                                <?= Html::button(Yii::t('app', 'Жазылу'), [
                                    'class' => 'btn btn-primary open-modal-btn',
                                    'data-id' => $model->id
                                ]) ?>
                            <?php endif; ?>
                        </div>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>

<!-- Modal -->
<div style="margin-top: 200px;" class="modal fade" id="receiptUploadModal" tabindex="-1" aria-labelledby="receiptUploadLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <?php $form = ActiveForm::begin([
                'id' => 'receipt-upload-form',
                'action' => ['course/upload-receipt'], // Create this action
                'options' => ['enctype' => 'multipart/form-data'],
            ]); ?>
            <div class="modal-header">
                <h5 class="modal-title" id="receiptUploadLabel"><?= Yii::t('app', 'Квитанцияны жүктеу') ?></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?= Html::hiddenInput('course_id', '', ['id' => 'modal-course-id']) ?>
                <?= Html::fileInput('receipt', null, ['accept' => 'application/pdf', 'class' => 'form-control']) ?>
            </div>
            <div class="modal-footer">
                <?= Html::submitButton(Yii::t('app', 'Жүктеу'), ['class' => 'btn btn-success']) ?>
            </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

<?php
$this->registerJs(<<<JS
$('.open-modal-btn').on('click', function() {
    var courseId = $(this).data('id');
    $('#modal-course-id').val(courseId);
    $('#receiptUploadModal').modal('show');
});
JS);
?>

