<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%tbl_schedule}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%tbl_subjects}}`
 */
class m211103_082355_add_subjects_id_column_to_tbl_schedule_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%tbl_schedule}}', 'subjects_id', $this->integer());

        // creates index for column `subjects_id`
        $this->createIndex(
            '{{%idx-tbl_schedule-subjects_id}}',
            '{{%tbl_schedule}}',
            'subjects_id'
        );

        // add foreign key for table `{{%tbl_subjects}}`
        $this->addForeignKey(
            '{{%fk-tbl_schedule-subjects_id}}',
            '{{%tbl_schedule}}',
            'subjects_id',
            '{{%tbl_subjects}}',
            'id',
            'RESTRICT'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%tbl_subjects}}`
        $this->dropForeignKey(
            '{{%fk-tbl_schedule-subjects_id}}',
            '{{%tbl_schedule}}'
        );

        // drops index for column `subjects_id`
        $this->dropIndex(
            '{{%idx-tbl_schedule-subjects_id}}',
            '{{%tbl_schedule}}'
        );

        $this->dropColumn('{{%tbl_schedule}}', 'subjects_id');
    }
}
