<?php

use common\models\Module;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Course $model */

$this->title = $model->title;
\yii\web\YiiAsset::register($this);
?>
<div class="course-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Өзгерту'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Өшіру'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            [
                'attribute' => 'img_path',
                'format' => 'raw',
                'value' => function($model){
                    return Html::a('Сурет', [$model->img_path], ['target' => '_blank']);
                }
            ]
        ],
    ]) ?>

    <br>
    <hr>

    <h1>Модульдері</h1>

    <p>
        <?= Html::a(Yii::t('app', 'Қосу'), ['module/create', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'id',
                'headerOptions' => ['style' => 'width: 5%'],
            ],
            'title',
            [
                'attribute' => 'img_path',
                'format' => 'raw',
                'value' => function($model){
                    return Html::a('Сурет', [$model->img_path], ['target' => '_blank']);
                }
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Module $model, $key, $index, $column) {
                    return Url::toRoute(['module/' . $action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>

</div>
