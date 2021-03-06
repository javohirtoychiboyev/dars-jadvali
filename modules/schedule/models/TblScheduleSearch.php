<?php

namespace app\modules\schedule\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\schedule\models\TblSchedule;

/**
 * TblScheduleSearch represents the model behind the search form of `app\modules\schedule\models\TblSchedule`.
 */
class TblScheduleSearch extends TblSchedule
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'teachers_id','subjects_id', 'rooms_id', 'groups_id', 'week_days_id', 'status', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['begin_time', 'end_time', 'reg_date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {

        $query = TblSchedule::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {

            return $dataProvider;
        }
        if($this->begin_time){
            $query->andFilterWhere(['<=', 'begin_time', '09:10'])
                  ->andFilterWhere(['>=', 'end_time', '09:10']);
        }

        $query->andFilterWhere([
            'teachers_id' => $this->teachers_id,
            'subjects_id' => $this->subjects_id,
            'teachers_rel_subjects_id' => $this->teachers_rel_subjects_id,
            'rooms_id' => $this->rooms_id,
            'groups_id' => $this->groups_id,
            'week_days_id' => $this->week_days_id,
            'status' => $this->status,
        ]);

        return $dataProvider;
    }
}
