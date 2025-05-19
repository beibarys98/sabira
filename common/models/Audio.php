<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%audio}}".
 *
 * @property int $id
 * @property int $book_id
 * @property string $title
 * @property string $file_path
 *
 * @property Book $book
 */
class Audio extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%audio}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['book_id', 'title', 'file_path'], 'required'],
            [['book_id'], 'integer'],
            [['title', 'file_path'], 'string', 'max' => 255],
            [['book_id'], 'exist', 'skipOnError' => true, 'targetClass' => Book::class, 'targetAttribute' => ['book_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'book_id' => 'Book ID',
            'title' => 'Title',
            'file_path' => 'File Path',
        ];
    }

    /**
     * Gets query for [[Book]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\BookQuery
     */
    public function getBook()
    {
        return $this->hasOne(Book::class, ['id' => 'book_id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\AudioQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\AudioQuery(get_called_class());
    }

}
