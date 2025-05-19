<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%book}}".
 *
 * @property int $id
 * @property string $title
 * @property string $file_path
 *
 * @property Audio[] $audios
 */
class Book extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%book}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'file_path'], 'required'],
            [['title', 'file_path'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'file_path' => 'File Path',
        ];
    }

    /**
     * Gets query for [[Audios]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\AudioQuery
     */
    public function getAudios()
    {
        return $this->hasMany(Audio::class, ['book_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\BookQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\BookQuery(get_called_class());
    }

}
