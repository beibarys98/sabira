<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%module}}".
 *
 * @property int $id
 * @property int $course_id
 * @property string $title
 *
 * @property Course $course
 * @property Lesson[] $lessons
 */
class Module extends \yii\db\ActiveRecord
{
    public $file;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%module}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['file', 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],

            [['course_id', 'title', 'img_path'], 'required'],
            [['course_id'], 'integer'],
            [['title', 'img_path'], 'string', 'max' => 255],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Course::class, 'targetAttribute' => ['course_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'course_id' => Yii::t('app', 'Course ID'),
            'title' => Yii::t('app', 'Title'),
        ];
    }

    /**
     * Gets query for [[Course]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\CourseQuery
     */
    public function getCourse()
    {
        return $this->hasOne(Course::class, ['id' => 'course_id']);
    }

    /**
     * Gets query for [[Lessons]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\LessonQuery
     */
    public function getLessons()
    {
        return $this->hasMany(Lesson::class, ['module_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\ModuleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ModuleQuery(get_called_class());
    }

}
