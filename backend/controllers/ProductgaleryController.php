<?php

namespace backend\controllers;

use Yii;
use common\models\Productgalery;
use common\models\ProductgalerySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProductgaleryController implements the CRUD actions for Productgalery model.
 */
class ProductgaleryController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
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
     * Lists all Productgalery models.
     * @return mixed
     */
    public function actionIndex($productId) {
        $searchModel = new ProductgalerySearch();
        $searchModel->productId = $productId;
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'productId' => $productId
        ]);
    }

    /**
     * Displays a single Productgalery model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Productgalery model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($productId) {
        $model = new Productgalery();

        if ($model->load(Yii::$app->request->post())) {
            $image = UploadedFile::getInstance($model, 'image');
            $model->productId = $productId;
            $model->image = rand(10000, 99999) . $image->name;
            $path = Yii::$app->basePath . '/web/uploads/product/' . $model->image;
            if ($model->save()) {
                $image->saveAs($path);
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Productgalery model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        $l_image = $model->image;
        $productId = $model->productId;
        if ($model->load(Yii::$app->request->post())) {
            $image = UploadedFile::getInstance($model, 'image');
            $path = Yii::$app->basePath . '/web/uploads/product/';
            if ($image) {
                if (file_exists($path . $l_image)) {
                    unlink($path . $l_image);
                }                
                $model->image = rand(10000, 99999) . $image->name;
            } else {
                $model->image = $l_image;
            }
            $model->productId = $productId;

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
     * Deletes an existing Productgalery model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $model = $this->findModel($id);
        $path = Yii::$app->basePath . '/web/uploads/product/';
        if (file_exists($path . $model->image)) {
            unlink($path . $model->image);
        }
        $model->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Productgalery model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Productgalery the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Productgalery::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
