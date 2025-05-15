<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%lesson}}".
 *
 * @property int $id
 * @property int $module_id
 * @property string $title
 *
 * @property Homework[] $homeworks
 * @property Module $module
 */
class Lesson extends \yii\db\ActiveRecord
{
    public $file;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%lesson}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['file', 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg'],

            [['module_id', 'title', 'img_path'], 'required'],
            [['module_id'], 'integer'],
            [['title', 'img_path'], 'string', 'max' => 255],
            [['module_id'], 'exist', 'skipOnError' => true, 'targetClass' => Module::class, 'targetAttribute' => ['module_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'module_id' => Yii::t('app', 'Module ID'),
            'title' => Yii::t('app', 'Title'),
        ];
    }

    /**
     * Gets query for [[Homeworks]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\HomeworkQuery
     */
    public function getHomeworks()
    {
        return $this->hasMany(Homework::class, ['lesson_id' => 'id']);
    }

    /**
     * Gets query for [[Module]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ModuleQuery
     */
    public function getModule()
    {
        return $this->hasOne(Module::class, ['id' => 'module_id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\LessonQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\LessonQuery(get_called_class());
    }

}
