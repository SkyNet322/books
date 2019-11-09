<?php

use yii\db\Migration;

/**
 * Class m191109_182303_new_moderators_table
 */
class m191109_182303_new_moderators_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(
            'moderators',
            [
                'id' => $this->primaryKey(),
                'username' => $this->string()->notNull()->unique(),
                'password' => $this->string()->notNull(),
                'token' => $this->string(),
                'auth_key' => $this->string()
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('moderators');
    }
}
