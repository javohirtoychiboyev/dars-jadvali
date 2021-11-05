<?php

use yii\db\Migration;

/**
 * Class m211103_181010_upsert_rows_to_spravochnik_table
 */
class m211103_181010_upsert_rows_to_spravochnik_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        // Gruxlarni kiritish

        $this->upsert('tbl_groups',['id'=>1, 'name' => "610-21-grux", 'status' => 1],true);
        $this->upsert('tbl_groups',['id'=>2, 'name' => "611-21-grux", 'status' => 1],true);
        $this->upsert('tbl_groups',['id'=>3, 'name' => "612-21-grux", 'status' => 1],true);
        $this->upsert('tbl_groups',['id'=>4, 'name' => "613-21-grux", 'status' => 1],true);
        $this->upsert('tbl_groups',['id'=>5, 'name' => "614-21-grux", 'status' => 1],true);
        $this->upsert('tbl_groups',['id'=>6, 'name' => "615-21-grux", 'status' => 1],true);
        $this->upsert('tbl_groups',['id'=>7, 'name' => "616-21-grux", 'status' => 1],true);
        $this->upsert('tbl_groups',['id'=>8, 'name' => "617-21-grux", 'status' => 1],true);
        $this->upsert('tbl_groups',['id'=>9, 'name' => "618-21-grux", 'status' => 1],true);
        $this->upsert('tbl_groups',['id'=>10, 'name' => "619-21-grux", 'status' => 1],true);
        $this->upsert('tbl_groups',['id'=>11, 'name' => "620-21-grux", 'status' => 1],true);

        // Auditoria kiritish

        $this->upsert('tbl_rooms',['id'=>1, 'name' => "101-xona", 'status' => 1],true);
        $this->upsert('tbl_rooms',['id'=>2, 'name' => "102-xona", 'status' => 1],true);
        $this->upsert('tbl_rooms',['id'=>3, 'name' => "103-xona", 'status' => 1],true);
        $this->upsert('tbl_rooms',['id'=>4, 'name' => "104-xona", 'status' => 1],true);
        $this->upsert('tbl_rooms',['id'=>5, 'name' => "105-xona", 'status' => 1],true);
        $this->upsert('tbl_rooms',['id'=>6, 'name' => "106-xona", 'status' => 1],true);
        $this->upsert('tbl_rooms',['id'=>7, 'name' => "107-xona", 'status' => 1],true);
        $this->upsert('tbl_rooms',['id'=>8, 'name' => "108-xona", 'status' => 1],true);
        $this->upsert('tbl_rooms',['id'=>9, 'name' => "109-xona", 'status' => 1],true);
        $this->upsert('tbl_rooms',['id'=>10, 'name' => "110-xona", 'status' => 1],true);

        // Darsliklar kiritish

        $this->upsert('tbl_subjects',['id'=>1, 'name' => "C++ dasturlash darsi", 'status' => 1],true);
        $this->upsert('tbl_subjects',['id'=>2, 'name' => "Php dasturlash darsi", 'status' => 1],true);
        $this->upsert('tbl_subjects',['id'=>3, 'name' => "JavaScript dasturlash darsi", 'status' => 1],true);
        $this->upsert('tbl_subjects',['id'=>4, 'name' => "Swift dasturlash darsi", 'status' => 1],true);
        $this->upsert('tbl_subjects',['id'=>5, 'name' => "Scala dasturlash darsi", 'status' => 1],true);
        $this->upsert('tbl_subjects',['id'=>6, 'name' => "Go dasturlash darsi", 'status' => 1],true);
        $this->upsert('tbl_subjects',['id'=>7, 'name' => "Python dasturlash darsi", 'status' => 1],true);
        $this->upsert('tbl_subjects',['id'=>8, 'name' => "Elm dasturlash darsi", 'status' => 1],true);
        $this->upsert('tbl_subjects',['id'=>9, 'name' => "Ruby dasturlash darsi", 'status' => 1],true);
        $this->upsert('tbl_subjects',['id'=>10, 'name' => "C# dasturlash darsi", 'status' => 1],true);

        // Hafta kunlarini kiritish

        $this->upsert('tbl_week_days',['id'=>1, 'name' => "Dushanba", 'status' => 1],true);
        $this->upsert('tbl_week_days',['id'=>2, 'name' => "Seshanba", 'status' => 1],true);
        $this->upsert('tbl_week_days',['id'=>3, 'name' => "Chorshanba", 'status' => 1],true);
        $this->upsert('tbl_week_days',['id'=>4, 'name' => "Payshanba", 'status' => 1],true);
        $this->upsert('tbl_week_days',['id'=>5, 'name' => "Juma", 'status' => 1],true);
        $this->upsert('tbl_week_days',['id'=>6, 'name' => "Shanba", 'status' => 1],true);
        $this->upsert('tbl_week_days',['id'=>7, 'name' => "Yakshanba", 'status' => 1],true);

        // O'qituvchilarni kiritish

        $this->upsert('tbl_teachers',['id'=>1, 'fio' => "Nabijonov Avazbek",'phone_number' => "+998 99 999 99 99",'person_info' => "Malakaliy dasturchi",'person_work_history' => "Koplab universitetlarda dars bergan", 'status' => 1],true);
        $this->upsert('tbl_teachers',['id'=>2, 'fio' => "Ergashboyev Kozimjon",'phone_number' => "+998 99 999 99 99",'person_info' => "Malakaliy dasturchi",'person_work_history' => "Koplab universitetlarda dars bergan", 'status' => 1],true);
        $this->upsert('tbl_teachers',['id'=>3, 'fio' => "Nabiyev Shoxrux",'phone_number' => "+998 99 999 99 99",'person_info' => "Malakaliy dasturchi",'person_work_history' => "Koplab universitetlarda dars bergan", 'status' => 1],true);
        $this->upsert('tbl_teachers',['id'=>4, 'fio' => "Ganiyev Jaxongir",'phone_number' => "+998 99 999 99 99",'person_info' => "Malakaliy dasturchi",'person_work_history' => "Koplab universitetlarda dars bergan", 'status' => 1],true);
        $this->upsert('tbl_teachers',['id'=>5, 'fio' => "Xamdamaliyev Rufat",'phone_number' => "+998 99 999 99 99",'person_info' => "Malakaliy dasturchi",'person_work_history' => "Koplab universitetlarda dars bergan", 'status' => 1],true);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m211103_181010_upsert_rows_to_spravochnik_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m211103_181010_upsert_rows_to_spravochnik_table cannot be reverted.\n";

        return false;
    }
    */
}
