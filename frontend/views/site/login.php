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
                    ->textInput(['autofocus' => true, 'placeholder' => 'Аккаунтыңыз'])
                    ->label(false) ?>

                <?= $form->field($model, 'password')
                    ->passwordInput(['placeholder' => 'Құпия сөз'])
                    ->label(false) ?>

                <div class="mb-3" style="color:#999;">
                    Құпия сөзді ұмыттыңыз ба?
                    <?= Html::a('Қалпына келтіру', ['site/request-password-reset']) ?><br>
                    Растау хатын алмағансыз ба?
                    <?= Html::a('Қайта жіберу', ['site/resend-verification-email']) ?>
                </div>

                <div class="form-group text-center">
                    <?= Html::submitButton('Кіру', ['class' => 'btn btn-primary w-100', 'name' => 'login-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
