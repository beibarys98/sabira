<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%course}}".
 *
 * @property int $id
 * @property string $title
 *
 * @property Module[] $modules
 * @property Participant[] $participants
 */
class Course extends \yii\db\ActiveRecord
{
    public $file;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%course}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['file', 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],

            [['title', 'img_path'], 'required'],
            [['title', 'img_path'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
        ];
    }

    /**
     * Gets query for [[Modules]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ModuleQuery
     */
    public function getModules()
    {
        return $this->hasMany(Module::class, ['course_id' => 'id']);
    }

    /**
     * Gets query for [[Participants]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ParticipantQuery
     */
    public function getParticipants()
    {
        return $this->hasMany(Participant::class, ['course_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\CourseQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\CourseQuery(get_called_class());
    }

}
