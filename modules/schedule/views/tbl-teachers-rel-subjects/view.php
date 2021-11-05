<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\schedule\models\TblTeachersRelSubjects */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tbl Teachers Rel Subjects'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tbl-teachers-rel-subjects-view">

    <h3><?php echo Yii::t('app', 'O\'qituvchiga biriktirilgan fanlar') ?></h3>

    <div class="pull-right no-print">
        <?= Html::a(Yii::t('app', 'Ortga'), ['index'], ['class' => 'btn btn-info']) ?>
        <?= Html::a(Yii::t('app', 'O\'zgartrish'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'O\'chirish'), ['delete', 'id' => $model->id], ['class' => 'btn btn-danger']) ?>
    </div>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'teachers_id',
            'subjects_id',
            'status',
        ],
    ]) ?>

</div>
