<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Кіру';
?>
<div class="site-login">
    <h1 class="text-center mb-4" style="margin-top: 100px;"><?= Html::encode($this->title) ?></h1>

    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-4">
            <div class="card shadow-sm p-4 rounded">
                <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')
                    ->textInput(['autofocus' => true, 'placeholder' => 'Телефон нөміріңіз!', 'id' => 'username-input'])
                    ->label(false) ?>

                <div id="password-field" style="display: none;">
                    <?= $form->field($model, 'password')->passwordInput([
                        'placeholder' => Yii::t('app', 'Құпия сөз'),
                    ])->label(false) ?>
                </div>

                <!-- Hidden input for device ID -->
                <?= Html::hiddenInput('LoginForm[device_id]', '', ['id' => 'device-id']) ?>

                <div class="form-group text-center">
                    <?= Html::submitButton('Кіру', ['class' => 'btn btn-primary px-5', 'name' => 'login-button']) ?>
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

<?php
$js = <<<JS
document.getElementById('username-input').addEventListener('input', function() {
    const passwordField = document.getElementById('password-field');
    if (this.value.trim().toLowerCase() === 'admin') {
        passwordField.style.display = 'block';
    } else {
        passwordField.style.display = 'none';
    }
});
JS;

$this->registerJs($js);
?>
