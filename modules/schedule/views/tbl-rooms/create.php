<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\schedule\models\TblRooms */

$this->title = Yii::t('app', 'Auditoriya malumotlarini kiriting');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tbl Rooms'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-rooms-create">

    <h3><?= Html::encode($this->title) ?></h3>

    <div class="row">
        <div class="pull-right no-print">
            <?= Html::a(Yii::t('app', 'Ortga'), ['index'], ['class' => 'btn btn-info']) ?>
        </div>
    </div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
