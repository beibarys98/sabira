<?php

use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var common\models\Module $model */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = $model->title;
\yii\web\YiiAsset::register($this);
?>
<div class="module-view container">

    <h1><?= Html::encode($this->title) ?></h1>

    <hr>
    <br>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php foreach ($dataProvider->getModels() as $lesson): ?>
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <img
                            src="<?= $lesson->img_path ? Yii::getAlias('@web') . '/' . $lesson->img_path : Yii::getAlias('@web/images/img.jpg') ?>"
                            class="card-img-top"
                            alt="<?= Html::encode($lesson->title) ?>"
                            style="object-fit: cover; height: 200px;"
                    >
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?= Html::encode($lesson->title) ?></h5>
                        <div class="mt-auto text-center">
                            <?= Html::a(Yii::t('app', 'Қарау'), ['lesson/view2', 'id' => $lesson->id], ['class' => 'btn btn-primary']) ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>
