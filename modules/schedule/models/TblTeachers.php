<?php

namespace app\modules\schedule\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "tbl_teachers".
 *
 * @property int $id
 * @property string|null $fio
 * @property string|null $phone_number
 * @property string|null $person_info
 * @property string|null $person_work_history
 * @property int|null $status
 * @property int|null $created_at
 * @property int|null $created_by
 * @property int|null $updated_at
 * @property int|null $updated_by
 *
 * @property TblTeachersRelSubjects[] $tblTeachersRelSubjects
 */
class TblTeachers extends \app\modules\schedule\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public $teachers_id;
    public static function tableName()
    {
        return 'tbl_teachers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['person_info', 'person_work_history'], 'string'],
            [['status', 'created_at', 'created_by', 'updated_at', 'updated_by','teachers_id'], 'integer'],
            [['fio'], 'string', 'max' => 255],
            [['phone_number'], 'string', 'max' => 45],
            [['teachers_id'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'fio' => Yii::t('app', 'F.I.Sh'),
            'phone_number' => Yii::t('app', 'Telefon nomer'),
            'person_info' => Yii::t('app', 'O\'qituvchi haqida'),
            'person_work_history' => Yii::t('app', 'O\'qituvchining ish tarixi'),
            'status' => Yii::t('app', 'Holati'),
            'created_at' => Yii::t('app', 'Created At'),
            'created_by' => Yii::t('app', 'Created By'),
            'updated_at' => Yii::t('app', 'Updated At'),
            'updated_by' => Yii::t('app', 'Updated By'),
        ];
    }

    /**
     * Gets query for [[TblTeachersRelSubjects]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblTeachersRelSubjects()
    {
        return $this->hasMany(TblTeachersRelSubjects::className(), ['teachers_id' => 'id']);
    }
    public function getTblSchedule()
    {
        return $this->hasMany(TblSchedule::className(), ['teachers_id' => 'id']);
    }
    public static function getList(){
        $data = self::find()
            ->where(['status' => BaseModel::STATUS_ACTIVE])
            ->asArray()
            ->all();
        if (!empty($data)){
            return ArrayHelper::map($data,'id', 'fio');
        }
        return '';
    }
}
