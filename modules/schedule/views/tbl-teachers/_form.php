<?php

use app\modules\schedule\models\BaseModel;
use kartik\select2\Select2;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\schedule\models\TblTeachers */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbl-teachers-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'fio')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'phone_number')->textInput(['maxlength' => true]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'person_info')->textarea(['rows' => 4]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'person_work_history')->textarea(['rows' => 4]) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'status')->widget(Select2::classname(), [
                'data' => BaseModel::getStatus(),
            ]); ?>
        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
