<?php

namespace app\modules\schedule\controllers;

use app\modules\schedule\models\BaseModel;
use app\modules\schedule\models\TblTeachers;
use app\modules\schedule\models\YordamchiModel;
use Yii;
use app\modules\schedule\models\TblTeachersRelSubjects;
use app\modules\schedule\models\TblTeachersRelSubjectsSearch;
use app\modules\schedule\controllers\BaseController;
use yii\base\BaseObject;
use yii\db\Exception;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TblTeachersRelSubjectsController implements the CRUD actions for TblTeachersRelSubjects model.
 */
class TblTeachersRelSubjectsController extends BaseController
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all TblTeachersRelSubjects models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblTeachersRelSubjectsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblTeachersRelSubjects model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new TblTeachersRelSubjects model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TblTeachers();
        $models = [new TblTeachersRelSubjects()];

        if (Yii::$app->request->post()) {
            $modelOne = Yii::$app->request->post('TblTeachers');
            $modelsArray= Yii::$app->request->post('TblTeachersRelSubjects');
            if(!empty($modelOne) && !empty($modelsArray)){
                try {

                    $transaction = Yii::$app->db->beginTransaction();
                    $saved = false;
                    foreach($modelsArray as $data) {
                        $items = new TblTeachersRelSubjects();
                        $items->attributes = $data;
                        $items->teachers_id = $modelOne['id'];
                        if ($items->save()) {
                            $saved = true;
                        } else {
                            $saved = false;
                        }
                    }

                    if ($saved) {
                        Yii::$app->session->setFlash("success", 'Ma\'lumot saqlandi');
                        $transaction->commit();
                        return $this->redirect(['index']);
                    }
                    else{
                        Yii::$app->session->setFlash("error", Yii::t('app', 'Saqlashda  xatolik.'));
                        $transaction->rollBack();
                    }

                } catch (Exception $e) {
                     \yii\helpers\VarDumper::dump($e, 10, true);
                     die;
                }
            }
        }
        return $this->render('create', [
            'model' => $model,
            'models' => $models,
        ]);
    }

    /**
     * Updates an existing TblTeachersRelSubjects model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $param = tblTeachersRelSubjects::find()
            ->alias('ttrs')
            ->select(['ttrs.teachers_id'])
            ->where(['ttrs.id' => $id])
            ->one();
        
        $model = TblTeachers::findOne(['id' => $param->teachers_id]);
        $models = !empty($model->tblTeachersRelSubjects) ? $model->tblTeachersRelSubjects : [new TblTeachersRelSubjects()];

        if (Yii::$app->request->post()) {
            $modelOne = Yii::$app->request->post('TblTeachers');
            $modelsArray= Yii::$app->request->post('TblTeachersRelSubjects');
            if(!empty($modelOne) && !empty($modelsArray)){
                try {
                    $transaction = Yii::$app->db->beginTransaction();
                    $saved = false;
                    TblTeachersRelSubjects::deleteAll(['teachers_id' => $param->teachers_id]);
                    foreach($modelsArray as $data) {
                        $items = new TblTeachersRelSubjects();
                        $items->attributes = $data;
                        $items->teachers_id = $modelOne['id'];

                        if ($items->save()) {
                            $saved = true;
                        } else {
                            $saved = false;
                        }
                    }

                    if ($saved) {
                        Yii::$app->session->setFlash("success", 'Ma\'lumot saqlandi');
                        $transaction->commit();
                        return $this->redirect(['index']);
                    }
                    else{
                        Yii::$app->session->setFlash("error", Yii::t('app', 'Saqlashda  xatolik.'));
                        $transaction->rollBack();
                    }

                } catch (Exception $e) {
                    \yii\helpers\VarDumper::dump($e, 10, true);
                    die;
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
            'models' => $models,
        ]);
    }

    /**
     * Deletes an existing TblTeachersRelSubjects model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TblTeachersRelSubjects model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TblTeachersRelSubjects the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TblTeachersRelSubjects::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
