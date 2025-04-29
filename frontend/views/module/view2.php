<?php

use common\models\Lesson;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Module $model */

$this->title = $model->title;
\yii\web\YiiAsset::register($this);
?>
<div class="module-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'course_id',
            'title',
        ],
    ]) ?>

    <h1>lessons</h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'title',
            [
                'class' => ActionColumn::className(),
                'template' => '{view}',
                'urlCreator' => function ($action, Lesson $model, $key, $index, $column) {
                    return Url::toRoute(['lesson/view2', 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>

</div>
