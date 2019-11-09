<?php

use yii\db\Migration;

/**
 * Class m191109_105031_fix_id_field_in_authors
 */
class m191109_105031_fix_id_field_in_authors extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameColumn('authors', 'id ', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->renameColumn('authors', 'id', 'id ');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191109_105031_fix_id_field_in_authors cannot be reverted.\n";

        return false;
    }
    */
}
