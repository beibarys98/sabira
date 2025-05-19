<?php

use common\models\Section;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Lesson $model */

$this->title = $model->title;

\yii\web\YiiAsset::register($this);
?>
<div class="lesson-view">

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
            'module.title',
            'title',
        ],
    ]) ?>

    <br>
    <hr>

    <h1>Секциялары</h1>

    <p>
        <?= Html::a('Қосу', ['section/create', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'id',
                'headerOptions' => ['style' => 'width: 5%'],
            ],
            'type',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Section $model, $key, $index, $column) {
                    return Url::toRoute(['section/' . $action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>

</div>
