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
                    ->textInput(['autofocus' => true, 'placeholder' => 'Аккаунт ойлап табыңыз'])
                    ->label(false) ?>

                <?= $form->field($model, 'email')
                    ->textInput(['placeholder' => 'Email'])
                    ->label(false) ?>

                <?= $form->field($model, 'password')
                    ->passwordInput(['placeholder' => 'Құпия сөз'])
                    ->label(false) ?>

                <div class="form-group text-center">
                    <?= Html::submitButton('Тіркелу', ['class' => 'btn btn-success w-100', 'name' => 'signup-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>
