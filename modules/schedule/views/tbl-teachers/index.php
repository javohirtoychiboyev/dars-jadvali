<?php

use app\modules\schedule\models\BaseModel;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\schedule\models\TblTeachersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Tbl Teachers');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-teachers-index">

    <div>
        <h4 class="alert alert-info"><?php echo Yii::t('app', 'O\'qituvchilar royhati') ?></h4>
    </div>
    <div class="pull-right no-print">
        <?= Html::a('<i class="glyphicon glyphicon-plus"></i>', ['create'], ['class' => 'btn btn-success']) ?>
    </div>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'fio',
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
                'header' =>  Yii::t('app', 'Action'),
            ],
        ],
    ]); ?>

</div>
