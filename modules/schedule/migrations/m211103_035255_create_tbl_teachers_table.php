<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tbl_teachers}}`.
 */
class m211103_035255_create_tbl_teachers_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tbl_teachers}}', [
            'id' => $this->primaryKey(),
            'fio' => $this->string(),
            'phone_number' => $this->string(45),
            'person_info' => $this->text(),
            'person_work_history' => $this->text(),
            'status' => $this->smallInteger(6)->defaultValue(1),
            'created_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_at' => $this->integer(),
            'updated_by' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%tbl_teachers}}');
    }
}
