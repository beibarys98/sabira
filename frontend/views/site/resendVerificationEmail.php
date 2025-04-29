<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\ResendVerificationEmailForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Растау хатын қайта жіберу';
?>
<div class="site-resend-verification-email">
    <h1 class="text-center mb-4"><?= Html::encode($this->title) ?></h1>

    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm p-4 rounded">
                <?php $form = ActiveForm::begin(['id' => 'resend-verification-email-form']); ?>

                <?= $form->field($model, 'email')
                    ->textInput(['autofocus' => true, 'placeholder' => 'Email'])
                    ->label(false) ?>

                <div class="form-group text-center">
                    <?= Html::submitButton('Жіберу', ['class' => 'btn btn-info w-100']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
