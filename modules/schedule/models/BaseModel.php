<?php
namespace app\modules\schedule\models;

use Yii;
use yii\db\ActiveRecord;

class BaseModel extends ActiveRecord
{
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 2;

    public static function getStatus(){
        return [
            self::STATUS_ACTIVE => Yii::t('app', 'Faol'),
            self::STATUS_INACTIVE => Yii::t('app', 'Faol emas')
        ];
    }
}