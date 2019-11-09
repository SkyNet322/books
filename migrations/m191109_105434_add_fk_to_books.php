<?php

use yii\db\Migration;

/**
 * Class m191109_104151_add_fk_to_books
 */
class m191109_105434_add_fk_to_books extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addForeignKey('fk-books-authors-id', 'books', 'author_id', 'authors', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-books-authors-id', 'books');
    }
}
