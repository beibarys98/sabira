<?php

use yii\helpers\Html;
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
            [
                'attribute' => 'img_path',
                'format' => 'raw',
                'value' => function($model){
                    return Html::a('Сурет', [$model->img_path], ['target' => '_blank']);
                }
            ],
        ],
    ]) ?>

</div>
