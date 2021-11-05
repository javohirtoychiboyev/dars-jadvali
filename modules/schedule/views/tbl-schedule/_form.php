<?php

use app\modules\schedule\models\BaseModel;
use app\modules\schedule\models\TblGroups;
use app\modules\schedule\models\TblRooms;
use app\modules\schedule\models\TblSubjects;
use app\modules\schedule\models\TblTeachers;
use app\modules\schedule\models\TblTeachersRelSubjects;
use app\modules\schedule\models\TblWeekDays;
use kartik\select2\Select2;
use kartik\time\TimePicker;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use unclead\multipleinput\TabularInput;
/* @var $this yii\web\View */
/* @var $model app\modules\schedule\models\TblSchedule */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="tbl-schedule-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->widget(Select2::className(), [
                        'data' => TblTeachersRelSubjects::getList(),
                        'options' => [
                            'placeholder' => '...'
                        ],
                        'pluginOptions' => [
                            'allowClear' => true
                        ]
     ])->label(Yii::t('app', 'Darslar biriktirilgan o\'qtuvchilar'));
      ?>

    <?= TabularInput::widget([
        'form' => $form,
        'models' => $models,
        'addButtonOptions' => [
            'class' => 'btn btn-success'
        ],
        'max' => 20,
        'min' => 0,
        'columns' => [
            [
                'name'  => 'subjects_id',
                'title' => 'Fanlar',
                'type'  => Select2::className(),
                'options' => [
                    'data' =>TblSubjects::getList() ,
                    'options' => [
                        'prompt' => '...' ,
                    ],
                ],
                'headerOptions' => [
                    'style' => 'width: 20%',
                ],
            ],
            [
                'name'  => 'rooms_id',
                'title' => 'Auditoriyalar',
                'type'  => Select2::className(),
                'options' => [
                    'data' =>TblRooms::getList() ,
                    'options' => [
                        'prompt' => '...' ,
                    ],
                ],
                'headerOptions' => [
                    'style' => 'width: 13%',
                ],
            ],
            [
                'name'  => 'groups_id',
                'title' => 'Gruxlar',
                'type'  => Select2::className(),
                'options' => [
                    'data' =>TblGroups::getList() ,
                    'options' => [
                        'prompt' => '...' ,
                    ],
                ],
                'headerOptions' => [
                    'style' => 'width: 13%',
                ],
            ],
            [
                'name'  => 'week_days_id',
                'title' => 'Hafta kunlari',
                'type'  => Select2::className(),
                'options' => [
                    'data' =>TblWeekDays::getList() ,
                    'options' => [
                        'prompt' => '...' ,
                    ],
                ],
                'headerOptions' => [
                    'style' => 'width: 15%',
                ],
            ],
            [
                'name'  => 'status',
                'title' => 'Holati',
                'type'  => Select2::className(),
                'options' => [
                    'data' =>BaseModel::getStatus(),
                ],
                'headerOptions' => [
                    'style' => 'width: 15%',
                ],
            ],
            [
                'name'  => 'begin_time',
                'title' => 'Dars boshlash vaqti',
                'type'  => TimePicker::className(),
                //'defaultValue' => '',
                'headerOptions' => [
                    'style' => 'width: 13%',
                ],
                'options' => [
                    'pluginOptions' => [
                        'showMeridian' => false,
                        'defaultTime' => null,
                        'autocomplete' => 'off',
                        'prompt' => '...',
                    ],
                ],
            ],
            [
                'name'  => 'end_time',
                'title' => 'Dars Tugash vaqti',
                'type'  => TimePicker::className(),
                'headerOptions' => [
                    'style' => 'width: 13%',
                ],
                'options' => [
                    'pluginOptions' => [
                        'showMeridian' => false,
                        'defaultTime' => null,
                        'autocomplete' => 'off',
                        'prompt' => '...',
                    ],
                ],
            ],
        ],
    ]) ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
