<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%homework}}".
 *
 * @property int $id
 * @property int $lesson_id
 * @property int $participant_id
 * @property string $file_path
 *
 * @property Comment[] $comments
 * @property Lesson $lesson
 * @property Participant $participant
 */
class Homework extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%homework}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lesson_id', 'participant_id', 'file_path'], 'required'],
            [['lesson_id', 'participant_id'], 'integer'],
            [['file_path'], 'string', 'max' => 255],
            [['lesson_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lesson::class, 'targetAttribute' => ['lesson_id' => 'id']],
            [['participant_id'], 'exist', 'skipOnError' => true, 'targetClass' => Participant::class, 'targetAttribute' => ['participant_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'lesson_id' => Yii::t('app', 'Lesson ID'),
            'participant_id' => Yii::t('app', 'Participant ID'),
            'file_path' => Yii::t('app', 'File Path'),
        ];
    }

    /**
     * Gets query for [[Comments]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\CommentQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::class, ['homework_id' => 'id']);
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
     * Gets query for [[Participant]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ParticipantQuery
     */
    public function getParticipant()
    {
        return $this->hasOne(Participant::class, ['id' => 'participant_id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\HomeworkQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\HomeworkQuery(get_called_class());
    }

}
