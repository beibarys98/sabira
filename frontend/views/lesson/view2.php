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

    <hr>
    <br>

    <?php foreach ($model->sections as $section): ?>
        <div class="card mb-3 p-3 border rounded bg-light">
            <?php if ($section->type === 'youtube' && !empty($section->link)): ?>
                <div class="ratio ratio-16x9 mb-2">
                    <?php
                    $videoId = '';
                    parse_str(parse_url($section->link, PHP_URL_QUERY), $params);
                    $videoId = $params['v'] ?? '';
                    ?>
                    <iframe
                            src="https://www.youtube.com/embed/<?= Html::encode($videoId) ?>"
                            title="YouTube video"
                            allowfullscreen
                            referrerpolicy="no-referrer"
                            sandbox="allow-same-origin allow-scripts"
                    ></iframe>

                </div>
            <?php elseif ($section->type === 'file' && !empty($section->file_path)): ?>
                <strong>Файл:</strong>
                <p><?= Html::a($section->file_path, Yii::getAlias('@web/') . $section->file_path, ['target' => '_blank']) ?></p>
            <?php elseif ($section->type === 'task' && !empty($section->task)): ?>
                <strong>Тапсырма:</strong>
                <div class="bg-white p-2 border rounded">
                    <p><?= nl2br(Html::encode($section->task)) ?></p>
                </div>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>

</div>
