<?php

namespace app\modules\schedule\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "tbl_teachers_rel_subjects".
 *
 * @property int $id
 * @property int|null $teachers_id
 * @property int|null $subjects_id
 * @property int|null $status
 * @property int|null $created_at
 * @property int|null $created_by
 * @property int|null $updated_at
 * @property int|null $updated_by
 *
 * @property TblSchedule[] $tblSchedules
 * @property TblSubjects $subjects
 * @property TblTeachers $teachers
 */
class TblTeachersRelSubjects extends \app\modules\schedule\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_teachers_rel_subjects';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['teachers_id', 'subjects_id', 'status', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['subjects_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblSubjects::className(), 'targetAttribute' => ['subjects_id' => 'id']],
            [['teachers_id'], 'exist', 'skipOnError' => true, 'targetClass' => TblTeachers::className(), 'targetAttribute' => ['teachers_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'teachers_id' => Yii::t('app', 'O\'qituvchilar'),
            'subjects_id' => Yii::t('app', 'Fanlar'),
            'status' => Yii::t('app', 'Holati'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    /**
     * Gets query for [[TblSchedules]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblSchedules()
    {
        return $this->hasMany(TblSchedule::className(), ['teachers_rel_subjects_id' => 'id']);
    }

    /**
     * Gets query for [[Subjects]].
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

    public static function getList(){
        $data = self::find()
            ->alias('ttrs')
            ->select([
                 "tt.id",
                 "tt.fio"
            ])
            ->leftJoin(['tt' => 'tbl_teachers'],'ttrs.teachers_id = tt.id')
            ->where(['ttrs.status' => BaseModel::STATUS_ACTIVE])
            ->groupBy(['ttrs.teachers_id'])
            ->asArray()
            ->all();
        if (!empty($data)){
            return ArrayHelper::map($data,'id', 'fio');
        }
        return '';
    }
}
