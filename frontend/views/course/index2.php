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

    <ul class="nav nav-tabs mb-3" id="courseBookTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="courses-tab" data-bs-toggle="tab" data-bs-target="#courses" type="button" role="tab" aria-controls="courses" aria-selected="true">
                <?= Yii::t('app', 'Курстар') ?>
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="books-tab" data-bs-toggle="tab" data-bs-target="#books" type="button" role="tab" aria-controls="books" aria-selected="false">
                <?= Yii::t('app', 'Кітаптар') ?>
            </button>
        </li>
    </ul>

    <div class="tab-content" id="courseBookTabsContent">
        <div class="tab-pane fade show active" id="courses" role="tabpanel" aria-labelledby="courses-tab">
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php foreach ($dataProvider->getModels() as $model): ?>
                    <div class="col">
                        <a href="<?= Url::to(['view2', 'id' => $model->id]) ?>" class="text-decoration-none text-dark">
                            <div class="card h-100 shadow-sm">
                                <img
                                        src="<?= $model->img_path ? Yii::getAlias('@web') . '/' . $model->img_path : Yii::getAlias('@web/images/img.jpg') ?>"
                                        class="card-img-top"
                                        alt="<?= Html::encode($model->title) ?>"
                                        style="object-fit: cover; height: 200px;"
                                >
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title"><?= Html::encode($model->title) ?></h5>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <div class="tab-pane fade" id="books" role="tabpanel" aria-labelledby="books-tab">
            <!-- 👇 Place your books content here -->
            <div class="alert alert-info mt-3">
                <?= Yii::t('app', 'Мұнда кітаптар көрсетіледі.') ?>
            </div>
        </div>
    </div>
</div>


