<?php

use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var common\models\Course $model */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = $model->title;
\yii\web\YiiAsset::register($this);
?>
<div class="course-view container">

    <h1><?= Html::encode($this->title) ?></h1>

    <hr>
    <br>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php foreach ($dataProvider->getModels() as $module): ?>
            <div class="col">
                <div class="card h-100 shadow-sm">
                    <img
                            src="<?= $module->img_path ? Yii::getAlias('@web') . '/' . $module->img_path : Yii::getAlias('@web/images/img.jpg') ?>"
                            class="card-img-top"
                            alt="<?= Html::encode($module->title) ?>"
                            style="object-fit: cover; height: 200px;"
                    >
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?= Html::encode($module->title) ?></h5>
                        <div class="mt-auto text-center">
                            <?= Html::a(Yii::t('app', 'Қарау'), ['module/view2', 'id' => $module->id], ['class' => 'btn btn-primary']) ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>
