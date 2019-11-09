<?php

use yii\db\Migration;

/**
 * Class m191109_101935_new_table_books
 */
class m191109_101935_new_table_books extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('books',
            [
                'id ' => $this->primaryKey(),
                'title' => $this->string(),
                'author_id' => $this->integer()
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('books');
    }
}
