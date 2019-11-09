<?php

use yii\db\Migration;

/**
 * Class m191109_101446_new_table_authors
 */
class m191109_101446_new_table_authors extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('authors',
            [
                'id ' => $this->primaryKey(),
                'first_name' => $this->string(),
                'middle_name' => $this->string(),
                'last_name' => $this->string(),
            ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->dropTable('authors');
    }
}
