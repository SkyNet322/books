<?php

use yii\db\Migration;

/**
 * Class m191109_113152_fix_id_field_in_books
 */
class m191109_113152_fix_id_field_in_books extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameColumn('books', 'id ', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->renameColumn('books', 'id', 'id ');
    }
}
