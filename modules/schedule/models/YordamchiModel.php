<?php

namespace app\modules\schedule\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property-read User|null $user This property is read-only.
 *
 */
class YordamchiModel extends Model
{
    public $id;
    public $teachers_id;
    public $teachers_rel_subjects_id;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['id','teachers_id','teachers_rel_subjects_id'], 'integer'],
            [['teachers_id','teachers_rel_subjects_id','id'], 'safe'],
        ];
    }
}