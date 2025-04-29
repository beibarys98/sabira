<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%comment}}".
 *
 * @property int $id
 * @property int $homework_id
 * @property string $comment
 *
 * @property Homework $homework
 */
class Comment extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%comment}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['homework_id', 'comment'], 'required'],
            [['homework_id'], 'integer'],
            [['comment'], 'string'],
            [['homework_id'], 'exist', 'skipOnError' => true, 'targetClass' => Homework::class, 'targetAttribute' => ['homework_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'homework_id' => Yii::t('app', 'Homework ID'),
            'comment' => Yii::t('app', 'Comment'),
        ];
    }

    /**
     * Gets query for [[Homework]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\HomeworkQuery
     */
    public function getHomework()
    {
        return $this->hasOne(Homework::class, ['id' => 'homework_id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\CommentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\CommentQuery(get_called_class());
    }

}
