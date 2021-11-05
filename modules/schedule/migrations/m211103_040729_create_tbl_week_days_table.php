<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tbl_week_days}}`.
 */
class m211103_040729_create_tbl_week_days_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tbl_week_days}}', [
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
        $this->dropTable('{{%tbl_week_days}}');
    }
}
