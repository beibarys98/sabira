<?php

use yii\helpers\Html;
use yii\helpers\Url;

/** @var yii\web\View $this */
/** @var common\models\search\CourseSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Курстар');

?>
<div class="course-index container mt-4">

    <h1 class="mb-4"><?= Html::encode($this->title) ?></h1>

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
                        <div class="mt-auto text-center">
                            <?= Html::a(Yii::t('app', 'Қарау'), ['view2', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>
