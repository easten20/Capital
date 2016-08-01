<?php

namespace backend\controllers;

use Yii;
use common\models\BrandType;
use common\models\BrandTypeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BrandTypeController implements the CRUD actions for BrandType model.
 */
class BrandtypeController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all BrandType models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new brandTypeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single BrandType model.
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
     * Creates a new BrandType model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new BrandType();        

        if ($model->load(Yii::$app->request->post())) {
            $model->upload();
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing BrandType model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
              
        if ($model->load(Yii::$app->request->post())) {            
            $model->upload();
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing BrandType model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the BrandType model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return BrandType the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = BrandType::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    /**
     * @param integer $id
     * @param integer $ImageId
     * @return true
     */
    public function actionRemove($id = 0, $imageId = 0) {
        $model = $this->findModel($id);

        switch ($imageId) {
        case 1:
            $filename = yii::getAlias('@root_path') . $model->image_1;
            if (is_file($filename)) {
                unlink(yii::getAlias('@root_path') . $model->image_1);
                $model->image_1 = "";
                $model->save();
            }
        case 2:
            $filename = yii::getAlias('@root_path') . $model->logo;
            if (is_file($filename)) {
                unlink(yii::getAlias('@root_path') . $model->logo);
                $model->logo = "";
                $model->save();
            }
            break;        
        default:
            # code...
            break;
        }
        return $this->redirect(['update', 'id' => $model->id]);
    }
}
