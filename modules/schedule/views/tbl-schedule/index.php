<?php

use app\modules\schedule\models\BaseModel;
use kartik\time\TimePicker;
use yii\bootstrap\Collapse;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\schedule\models\TblScheduleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Tbl Schedules');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="no-print">
    <?php
        echo Collapse::widget([
            'items' => [
                [
                    'label' => Yii::t('app', 'Qidirish oynasi'),
                    'content' => $this->render('search/schedule', [
                        'model' => $searchModel
                    ]),
                    'contentOptions' => ['class' => 'in']
                ]
            ]
        ]);
    ?>
</div>
<div class="tbl-schedule-index">
    <div>
        <h5 class="alert alert-info"><?php echo Yii::t('app', 'O\'qituvchilar royhati') ?></h5>
    </div>
    <div class="pull-right no-print">
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'], ['class' => 'btn btn-success']) ?>
    </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'teachers_id',
                'value' => function ($model) {
                    return $model->teachers->fio;
                },
            ],
            [
                'attribute' => 'subjects_id',
                'value' => function ($model) {
                    return $model->subjects->name;
                },
            ],

            [
                'attribute' => 'rooms_id',
                'value' => function ($model) {
                    return $model->rooms->name;
                },
            ],
            [
                'attribute' => 'groups_id',
                'value' => function ($model) {
                    return $model->groups->name;
                },
            ],
            [
                'attribute' => 'week_days_id',
                'value' => function ($model) {
                    return $model->weekDays->name;
                },
            ],
            [
                'attribute' => 'begin_time',
                'value' => 'begin_time',

            ],
            [
                'attribute' => 'end_time',
                'value' => 'end_time',
            ],

            [
                'attribute' => 'status',
                'value' => function($model) {
                    if($model->status == BaseModel::STATUS_ACTIVE) {
                        return Yii::t('app', 'Faol');
                    }
                    else {
                        return Yii::t('app', 'Faol emas');
                    }
                },
            ],
            [
                 'class' => 'yii\grid\ActionColumn',
                 'header' => Yii::t('app', 'Action'),
                 'template' => '{update}',
            ],
        ],
    ]); ?>


</div>
