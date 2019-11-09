<?php

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "books".
 *
 * @property int $id
 * @property string $title
 * @property int $author_id
 *
 * @property Author $author
 */
class Book extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'books';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['author_id', 'title'], 'required'],
            [['author_id'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [
                ['author_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Author::class,
                'targetAttribute' => ['author_id' => 'id']
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Номер',
            'title' => 'Название',
            'author_id' => 'Автор',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(Author::class, ['id' => 'author_id']);
    }
}
