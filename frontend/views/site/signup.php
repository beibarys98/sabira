<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\SignupForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Тіркелу';
?>
<div class="site-signup">
    <h1 class="text-center mb-4" style="margin-top: 100px;"><?= Html::encode($this->title) ?></h1>

    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm p-4 rounded">
                <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')
                    ->textInput(['autofocus' => true, 'placeholder' => 'Телефон нөміріңіз'])
                    ->label(false) ?>

                <?= $form->field($model, 'name')
                    ->textInput(['placeholder' => 'Есіміңіз'])
                    ->label(false) ?>

                <!-- Hidden input for device ID -->
                <?= Html::hiddenInput('SignupForm[device_id]', '', ['id' => 'device-id']) ?>

                <div class="form-group text-center">
                    <?= Html::submitButton('Тіркелу', ['class' => 'btn btn-success px-5', 'name' => 'signup-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>

                <script src="https://cdn.jsdelivr.net/npm/@fingerprintjs/fingerprintjs@3/dist/fp.min.js"></script>
                <script>
                    FingerprintJS.load().then(fp => {
                        fp.get().then(result => {
                            console.log('Device ID:', result.visitorId); // For debugging
                            document.getElementById("device-id").value = result.visitorId;
                        });
                    });
                </script>

            </div>
        </div>
    </div>
</div>

