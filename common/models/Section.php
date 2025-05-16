<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%section}}".
 *
 * @property int $id
 * @property int $lesson_id
 * @property string $type
 * @property string|null $link
 * @property string|null $file_path
 * @property string|null $task
 *
 * @property Lesson $lesson
 */
class Section extends \yii\db\ActiveRecord
{
    public $file;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%section}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['file', 'file', 'extensions' => 'doc, docx, xls, xlsx, ppt, pptx, pdf'],

            [['link', 'file_path', 'task'], 'default', 'value' => null],
            [['lesson_id', 'type'], 'required'],
            [['lesson_id'], 'integer'],
            [['task'], 'string'],
            [['type', 'link', 'file_path'], 'string', 'max' => 255],
            [['lesson_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lesson::class, 'targetAttribute' => ['lesson_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lesson_id' => 'Lesson ID',
            'type' => 'Type',
            'link' => 'Link',
            'file_path' => 'File Path',
            'task' => 'Task',
        ];
    }

    /**
     * Gets query for [[Lesson]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\LessonQuery
     */
    public function getLesson()
    {
        return $this->hasOne(Lesson::class, ['id' => 'lesson_id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\SectionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\SectionQuery(get_called_class());
    }

}
