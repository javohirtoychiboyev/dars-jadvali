<?php

namespace app\modules\schedule\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "tbl_schedule".
 *
 * @property int $id
 * @property int|null $teachers_rel_subjects_id
 * @property int|null $rooms_id
 * @property int|null $groups_id
 * @property int|null $week_days_id
 * @property string|null $begin_time
 * @property string|null $end_time
 * @property string|null $reg_date
 * @property int|null $status
 * @property int|null $created_at
 * @property int|null $created_by
 * @property int|null $updated_at
 * @property int|null $updated_by
 *
 * @property TblGroups $groups
 * @property TblRooms $rooms
 * @property TblTeachersRelSubjects $teachersRelSubjects
 * @property TblWeekDays $weekDays
 */
class TblSchedule extends \app\modules\schedule\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_schedule';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['teachers_id','teachers_rel_subjects_id', 'rooms_id', 'groups_id', 'week_days_id','subjects_id', 'status', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['begin_time', 'end_time', 'reg_date'], 'safe'],
            [['groups_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblGroups::className(), 'targetAttribute' => ['groups_id' => 'id']],
            [['rooms_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblRooms::className(), 'targetAttribute' => ['rooms_id' => 'id']],
            [['teachers_rel_subjects_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblTeachersRelSubjects::className(), 'targetAttribute' => ['teachers_rel_subjects_id' => 'id']],
            [['week_days_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblWeekDays::className(), 'targetAttribute' => ['week_days_id' => 'id']],
            [['subjects_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblSubjects::className(), 'targetAttribute' => ['subjects_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'teachers_rel_subjects_id' => Yii::t('app', 'O\'qtuvchilar'),
            'teachers_id' => Yii::t('app', 'O\'qtuvchilar'),
            'subjects_id' => Yii::t('app', 'Fanlar'),
            'rooms_id' => Yii::t('app', 'Auditoriya'),
            'groups_id' => Yii::t('app', 'Gruxlar'),
            'week_days_id' => Yii::t('app', 'Hafta kunlari'),
            'begin_time' => Yii::t('app', 'Dars boshlanish vaqti'),
            'end_time' => Yii::t('app', 'Dars tugatish vaqti'),
            'reg_date' => Yii::t('app', 'Sana'),
            'status' => Yii::t('app', 'Holati'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    /**
     * Gets query for [[Groups]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubjects()
    {
        return $this->hasOne(TblSubjects::className(), ['id' => 'subjects_id']);
    }

    /**
     * Gets query for [[Teachers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTeachers()
    {
        return $this->hasOne(TblTeachers::className(), ['id' => 'teachers_id']);
    }

    public function getGroups()
    {
        return $this->hasOne(TblGroups::className(), ['id' => 'groups_id']);
    }

    /**
     * Gets query for [[Rooms]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRooms()
    {
        return $this->hasOne(TblRooms::className(), ['id' => 'rooms_id']);
    }

    /**
     * Gets query for [[TeachersRelSubjects]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTeachersRelSubjects()
    {
        return $this->hasOne(TblTeachersRelSubjects::className(), ['id' => 'teachers_rel_subjects_id']);
    }

    /**
     * Gets query for [[WeekDays]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getWeekDays()
    {
        return $this->hasOne(TblWeekDays::className(), ['id' => 'week_days_id']);
    }

    public static function getList(){
        $data = self::find()
            ->where(['status' => BaseModel::STATUS_ACTIVE])
            ->asArray()
            ->all();
        if (!empty($data)){
            return ArrayHelper::map($data,'id', 'name');
        }
        return '';
    }
}
