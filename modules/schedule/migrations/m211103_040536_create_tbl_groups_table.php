<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tbl_groups}}`.
 */
class m211103_040536_create_tbl_groups_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tbl_groups}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'status' => $this->smallInteger(6)->defaultValue(1),
            'created_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_at' => $this->integer(),
            'updated_by' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tbl_groups}}');
    }
}
