<?php

namespace app\modules\schedule\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "tbl_week_days".
 *
 * @property int $id
 * @property string|null $name
 * @property int|null $status
 * @property int|null $created_at
 * @property int|null $created_by
 * @property int|null $updated_at
 * @property int|null $updated_by
 *
 * @property TblSchedule[] $tblSchedules
 */
class TblWeekDays extends \app\modules\schedule\models\BaseModel
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_week_days';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Hafta kuni'),
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
        return $this->hasMany(TblSchedule::className(), ['week_days_id' => 'id']);
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
