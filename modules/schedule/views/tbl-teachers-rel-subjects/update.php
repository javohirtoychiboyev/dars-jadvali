<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\schedule\models\TblTeachersRelSubjects */

$this->title = Yii::t('app', 'Malumotlarni o\'zgartirishingiz mumkin', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tbl Teachers Rel Subjects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="tbl-teachers-rel-subjects-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="pull-right no-print">
            <?= Html::a(Yii::t('app', 'Ortga'), ['index'], ['class' => 'btn btn-info']) ?>
        </div>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
        'models' => $models,
    ]) ?>

</div>
