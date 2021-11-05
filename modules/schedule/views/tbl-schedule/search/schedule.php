<?php

use app\modules\schedule\models\BaseModel;
use kartik\select2\Select2;
use kartik\time\TimePicker;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\schedule\models\TblSchedule */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-week-days-form">

    <?php $form = ActiveForm::begin([
        'method' => 'get',
    ]); ?>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'rooms_id')->widget(Select2::className(), [
                'data' => \app\modules\schedule\models\TblRooms::getList(),
                'options' => [
                    'placeholder' => '...'
                ],
                'pluginOptions' => [
                    'allowClear' => true
                ]
            ]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'subjects_id')->widget(Select2::className(), [
                'data' => \app\modules\schedule\models\TblSubjects::getList(),
                'options' => [
                    'placeholder' => '...'
                ],
                'pluginOptions' => [
                    'allowClear' => true
                ]
            ]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'teachers_id')->widget(Select2::className(), [
                'data' => \app\modules\schedule\models\TblTeachers::getList(),
                'options' => [
                    'placeholder' => '...'
                ],
                'pluginOptions' => [
                    'allowClear' => true
                ]
            ]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'groups_id')->widget(Select2::className(), [
                'data' => \app\modules\schedule\models\TblGroups::getList(),
                'options' => [
                    'placeholder' => '...'
                ],
                'pluginOptions' => [
                    'allowClear' => true
                ]
            ]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'status')->widget(Select2::className(), [
                'data' => \app\modules\schedule\models\BaseModel::getStatus(),
                'options' => [
                    'placeholder' => '...'
                ],
                'pluginOptions' => [
                    'allowClear' => true
                ]
            ]) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'begin_time')->widget(TimePicker::classname(), [
                'pluginOptions' => [
                    'showMeridian' => false,
                    'defaultTime' => null,
                    'prompt' => '...',
                ],
                'options'=>[
                    'class'=>'form-control',
                ],
            ])->label('Vaqt') ?>
        </div>
    </div>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Qidirish'), ['class' => 'btn btn-success btn-md']) ?>
        <?= Html::a('Filterni bekor qilish', Url::to(['index']), ['class' => 'btn btn-danger btn-md']) ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>

