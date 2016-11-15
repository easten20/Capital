<?php

namespace backend\controllers;

use Yii;
use common\models\Portfoliogalery;
use common\models\PortfoliogalerySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
/**
 * PortfoliogaleryController implements the CRUD actions for Portfoliogalery model.
 */
class PortfoliogaleryController extends Controller
{
    /**
     * @inheritdoc
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
     * Lists all Portfoliogalery models.
     * @return mixed
     */
    public function actionIndex($portfolioId)
    {
        $searchModel = new PortfoliogalerySearch();
        $searchModel->portfolioId = $portfolioId;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'portfolioId' => $portfolioId
        ]);
    }

    /**
     * Displays a single Portfoliogalery model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Portfoliogalery model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($portfolioId)
    {
        $model = new Portfoliogalery();

        if ($model->load(Yii::$app->request->post())) {
            $image = UploadedFile::getInstance($model, 'image');
            $model->portfolioId = $portfolioId;
            $model->image = rand(10000, 99999) . $image->name;
            $path = Yii::$app->basePath . '/web/uploads/portfolio/' . $model->image;            
            if ($model->save()) {
                $image->saveAs($path);
                return $this->redirect(['view', 'id' => $model->id]);
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Portfoliogalery model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $l_image = $model->image;
        if ($model->load(Yii::$app->request->post())) {
            $image = UploadedFile::getInstance($model, 'image');
            $path = Yii::$app->basePath . '/web/uploads/portfolio/';
            if ($image) {
                if (file_exists($path . $l_image)) {
                    unlink($path . $l_image);
                }
                $model->image = rand(10000, 99999) . $image->name;
            } else {
                $model->image = $l_image;
            }
            if ($model->save()) {
                if ($image)
                    $image->saveAs($path . $model->image);
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Portfoliogalery model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $path = Yii::$app->basePath . '/web/uploads/portfolio/';
        if (file_exists($path . $model->image)) {
            unlink($path . $model->image);
        }
        $model->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Portfoliogalery model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Portfoliogalery the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Portfoliogalery::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
