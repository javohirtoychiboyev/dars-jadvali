<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tbl_schedule}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%tbl_teachers_rel_subjects}}`
 * - `{{%tbl_rooms}}`
 * - `{{%tbl_groups}}`
 * - `{{%tbl_week_days}}`
 */
class m211103_050223_create_tbl_schedule_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tbl_schedule}}', [
            'id' => $this->primaryKey(),
            'teachers_rel_subjects_id' => $this->integer(),
            'rooms_id' => $this->integer(),
            'groups_id' => $this->integer(),
            'week_days_id' => $this->integer(),
            'begin_time' => $this->time(),
            'end_time' => $this->time(),
            'reg_date' => $this->dateTime(),
            'status' => $this->smallInteger(6)->defaultValue(1),
            'created_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_at' => $this->integer(),
            'updated_by' => $this->integer()
        ]);

        // creates index for column `teachers_rel_subjects_id`
        $this->createIndex(
            '{{%idx-tbl_schedule-teachers_rel_subjects_id}}',
            '{{%tbl_schedule}}',
            'teachers_rel_subjects_id'
        );

        // add foreign key for table `{{%tbl_teachers_rel_subjects}}`
        $this->addForeignKey(
            '{{%fk-tbl_schedule-teachers_rel_subjects_id}}',
            '{{%tbl_schedule}}',
            'teachers_rel_subjects_id',
            '{{%tbl_teachers_rel_subjects}}',
            'id',
            'RESTRICT'
        );

        // creates index for column `rooms_id`
        $this->createIndex(
            '{{%idx-tbl_schedule-rooms_id}}',
            '{{%tbl_schedule}}',
            'rooms_id'
        );

        // add foreign key for table `{{%tbl_rooms}}`
        $this->addForeignKey(
            '{{%fk-tbl_schedule-rooms_id}}',
            '{{%tbl_schedule}}',
            'rooms_id',
            '{{%tbl_rooms}}',
            'id',
            'RESTRICT'
        );

        // creates index for column `groups_id`
        $this->createIndex(
            '{{%idx-tbl_schedule-groups_id}}',
            '{{%tbl_schedule}}',
            'groups_id'
        );

        // add foreign key for table `{{%tbl_groups}}`
        $this->addForeignKey(
            '{{%fk-tbl_schedule-groups_id}}',
            '{{%tbl_schedule}}',
            'groups_id',
            '{{%tbl_groups}}',
            'id',
            'RESTRICT'
        );

        // creates index for column `week_days_id`
        $this->createIndex(
            '{{%idx-tbl_schedule-week_days_id}}',
            '{{%tbl_schedule}}',
            'week_days_id'
        );

        // add foreign key for table `{{%tbl_week_days}}`
        $this->addForeignKey(
            '{{%fk-tbl_schedule-week_days_id}}',
            '{{%tbl_schedule}}',
            'week_days_id',
            '{{%tbl_week_days}}',
            'id',
            'RESTRICT'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%tbl_teachers_rel_subjects}}`
        $this->dropForeignKey(
            '{{%fk-tbl_schedule-teachers_rel_subjects_id}}',
            '{{%tbl_schedule}}'
        );

        // drops index for column `teachers_rel_subjects_id`
        $this->dropIndex(
            '{{%idx-tbl_schedule-teachers_rel_subjects_id}}',
            '{{%tbl_schedule}}'
        );

        // drops foreign key for table `{{%tbl_rooms}}`
        $this->dropForeignKey(
            '{{%fk-tbl_schedule-rooms_id}}',
            '{{%tbl_schedule}}'
        );

        // drops index for column `rooms_id`
        $this->dropIndex(
            '{{%idx-tbl_schedule-rooms_id}}',
            '{{%tbl_schedule}}'
        );

        // drops foreign key for table `{{%tbl_groups}}`
        $this->dropForeignKey(
            '{{%fk-tbl_schedule-groups_id}}',
            '{{%tbl_schedule}}'
        );

        // drops index for column `groups_id`
        $this->dropIndex(
            '{{%idx-tbl_schedule-groups_id}}',
            '{{%tbl_schedule}}'
        );

        // drops foreign key for table `{{%tbl_week_days}}`
        $this->dropForeignKey(
            '{{%fk-tbl_schedule-week_days_id}}',
            '{{%tbl_schedule}}'
        );

        // drops index for column `week_days_id`
        $this->dropIndex(
            '{{%idx-tbl_schedule-week_days_id}}',
            '{{%tbl_schedule}}'
        );

        $this->dropTable('{{%tbl_schedule}}');
    }
}
