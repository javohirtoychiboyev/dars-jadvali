<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%tbl_schedule}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%tbl_teachers}}`
 */
class m211104_092652_add_teachers_id_column_to_tbl_schedule_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%tbl_schedule}}', 'teachers_id', $this->integer());

        // creates index for column `teachers_id`
        $this->createIndex(
            '{{%idx-tbl_schedule-teachers_id}}',
            '{{%tbl_schedule}}',
            'teachers_id'
        );

        // add foreign key for table `{{%tbl_teachers}}`
        $this->addForeignKey(
            '{{%fk-tbl_schedule-teachers_id}}',
            '{{%tbl_schedule}}',
            'teachers_id',
            '{{%tbl_teachers}}',
            'id',
            'RESTRICT'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%tbl_teachers}}`
        $this->dropForeignKey(
            '{{%fk-tbl_schedule-teachers_id}}',
            '{{%tbl_schedule}}'
        );

        // drops index for column `teachers_id`
        $this->dropIndex(
            '{{%idx-tbl_schedule-teachers_id}}',
            '{{%tbl_schedule}}'
        );

        $this->dropColumn('{{%tbl_schedule}}', 'teachers_id');
    }
}
