<?php

use app\modules\schedule\models\BaseModel;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\schedule\models\TblTeachersRelSubjectsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Tbl Teachers Rel Subjects');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-teachers-rel-subjects-index">

    <div>
        <h4 class="alert alert-info"><?php echo Yii::t('app', 'O\'qituvchilarga biriktrilgan fanlar') ?></h4>
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
                }
            ],
            [
                'attribute' => 'subjects_id',
                'value' => function ($model) {
                    return $model->subjects->name;
                }
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
                }
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {view}',
                'header' => Yii::t('app', 'Action')
            ],
        ],
    ]); ?>


</div>
