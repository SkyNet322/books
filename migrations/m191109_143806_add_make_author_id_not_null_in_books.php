<?php

use yii\db\Migration;

/**
 * Class m191109_143806_add_make_author_id_not_null_in_books
 */
class m191109_143806_add_make_author_id_not_null_in_books extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('books', 'author_id', $this->integer()->notNull());
        $this->alterColumn('books', 'title', $this->string()->notNull());
        $this->alterColumn('authors', 'first_name', $this->string()->notNull());
        $this->alterColumn('authors', 'middle_name', $this->string()->notNull());
        $this->alterColumn('authors', 'last_name', $this->string()->notNull());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn('books', 'author_id', $this->integer()->Null());
        $this->alterColumn('books', 'title', $this->string()->Null());
        $this->alterColumn('authors', 'first_name', $this->string()->Null());
        $this->alterColumn('authors', 'middle_name', $this->string()->Null());
        $this->alterColumn('authors', 'last_name', $this->string()->Null());
    }
}
