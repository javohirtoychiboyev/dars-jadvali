<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tbl_teachers_rel_subjects}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%tbl_teachers}}`
 * - `{{%tbl_subjects}}`
 */
class m211103_042219_create_tbl_teachers_rel_subjects_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tbl_teachers_rel_subjects}}', [
            'id' => $this->primaryKey(),
            'teachers_id' => $this->integer(),
            'subjects_id' => $this->integer(),
            'status' => $this->smallInteger(6)->defaultValue(1),
            'created_at' => $this->integer(),
            'created_by' => $this->integer(),
            'updated_at' => $this->integer(),
            'updated_by' => $this->integer()
        ]);

        // creates index for column `teachers_id`
        $this->createIndex(
            '{{%idx-tbl_teachers_rel_subjects-teachers_id}}',
            '{{%tbl_teachers_rel_subjects}}',
            'teachers_id'
        );

        // add foreign key for table `{{%tbl_teachers}}`
        $this->addForeignKey(
            '{{%fk-tbl_teachers_rel_subjects-teachers_id}}',
            '{{%tbl_teachers_rel_subjects}}',
            'teachers_id',
            '{{%tbl_teachers}}',
            'id',
            'RESTRICT'
        );

        // creates index for column `subjects_id`
        $this->createIndex(
            '{{%idx-tbl_teachers_rel_subjects-subjects_id}}',
            '{{%tbl_teachers_rel_subjects}}',
            'subjects_id'
        );

        // add foreign key for table `{{%tbl_subjects}}`
        $this->addForeignKey(
            '{{%fk-tbl_teachers_rel_subjects-subjects_id}}',
            '{{%tbl_teachers_rel_subjects}}',
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
        // drops foreign key for table `{{%tbl_teachers}}`
        $this->dropForeignKey(
            '{{%fk-tbl_teachers_rel_subjects-teachers_id}}',
            '{{%tbl_teachers_rel_subjects}}'
        );

        // drops index for column `teachers_id`
        $this->dropIndex(
            '{{%idx-tbl_teachers_rel_subjects-teachers_id}}',
            '{{%tbl_teachers_rel_subjects}}'
        );

        // drops foreign key for table `{{%tbl_subjects}}`
        $this->dropForeignKey(
            '{{%fk-tbl_teachers_rel_subjects-subjects_id}}',
            '{{%tbl_teachers_rel_subjects}}'
        );

        // drops index for column `subjects_id`
        $this->dropIndex(
            '{{%idx-tbl_teachers_rel_subjects-subjects_id}}',
            '{{%tbl_teachers_rel_subjects}}'
        );

        $this->dropTable('{{%tbl_teachers_rel_subjects}}');
    }
}
