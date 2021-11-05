<?php

use app\modules\schedule\models\BaseModel;
use app\modules\schedule\models\TblSubjects;
use app\modules\schedule\models\TblTeachers;
use kartik\select2\Select2;
use unclead\multipleinput\TabularInput;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\schedule\models\TblTeachersRelSubjects */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-teachers-rel-subjects-form">
    <?php $form = ActiveForm::begin(['options' => [
        'enctype' => 'multipart/form-data'
    ]]); ?>
    <?php
    echo $form->field($model, 'id')->widget(Select2::className(), [
        'data' => TblTeachers::getList(),
        'options' => [
            'placeholder' => '...'
        ],
        'pluginOptions' => [
            'allowClear' => true
        ]
    ])->label(Yii::t('app', 'O\'qituvchilar'));
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
                    'style' => 'width: 70%',
                ],
            ],
            [
                'name'  => 'status',
                'title' => 'Holati',
                'type'  => Select2::className(),
                'options' => [
                    'data' => BaseModel::getStatus() ,

                ],
                'headerOptions' => [
                    'style' => 'width: 30%',
               ],
            ],
        ],
    ]) ?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
