<?php

namespace frontend\controllers;

use common\models\Course;
use common\models\Participant;
use common\models\search\CourseSearch;
use common\models\search\ModuleSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * CourseController implements the CRUD actions for Course model.
 */
class CourseController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Course models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CourseSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndex2()
    {
        $searchModel = new CourseSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index2', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionUploadReceipt()
    {
        $courseId = Yii::$app->request->post('course_id');
        $file = UploadedFile::getInstanceByName('receipt');

        if ($file && $file->extension === 'pdf') {
            $filePath = 'uploads/' . Yii::$app->security->generateRandomString() . '.' . $file->extension;
            if ($file->saveAs($filePath)) {
                $participant = new Participant();
                $participant->user_id = Yii::$app->user->id;
                $participant->course_id = $courseId;
                $participant->file_path = $filePath; // If you want to store it

                if ($participant->save()) {
                    Yii::$app->session->setFlash('success', 'Сәтті тіркелдіңіз және квитанция жүктелді.');
                } else {
                    Yii::$app->session->setFlash('error', 'Қатысушыны тіркеу кезінде қате пайда болды.');
                }
            } else {
                Yii::$app->session->setFlash('error', 'Файлды сақтау кезінде қате пайда болды.');
            }
        } else {
            Yii::$app->session->setFlash('error', 'PDF файлын таңдаңыз.');
        }

        return $this->redirect(['view2', 'id' => $courseId]);
    }


    /**
     * Displays a single Course model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $searchModel = new ModuleSearch();
        $params = $this->request->queryParams;
        $params['ModuleSearch']['course_id'] = $id;
        $dataProvider = $searchModel->search($params);

        return $this->render('view', [
            'model' => $this->findModel($id),
            'dataProvider' => $dataProvider,
            'searchModel' => $searchModel,
        ]);
    }

    public function actionView2($id)
    {
        $searchModel = new ModuleSearch();
        $params = $this->request->queryParams;
        $params['ModuleSearch']['course_id'] = $id;
        $dataProvider = $searchModel->search($params);

        return $this->render('view2', [
            'model' => $this->findModel($id),
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Course model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Course();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $model->file = UploadedFile::getInstance($model, 'file');

                if($model->file){
                    $filePath = 'uploads/' . Yii::$app->security->generateRandomString() . '.' . $model->file->extension;
                    $model->file->saveAs($filePath);
                    $model->img_path = $filePath;
                    $model->save(false);
                }

                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Course model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post())) {
            $model->file = UploadedFile::getInstance($model, 'file');

            if($model->file){
                $filePath = 'uploads/' . Yii::$app->security->generateRandomString() . '.' . $model->file->extension;
                $model->file->saveAs($filePath);
                $model->img_path = $filePath;
            }
            $model->save(false);

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Course model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Course model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Course the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Course::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
