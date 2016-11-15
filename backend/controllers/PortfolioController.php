<?php

namespace backend\controllers;

use Yii;
use common\models\Portfolio;
use common\models\PortfolioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;

/**
 * PortfolioController implements the CRUD actions for Portfolio model.
 */
class PortfolioController extends Controller
{
    public function behaviors()
    {
        return [
         'access' => [
                'class' => AccessControl::className(),                
                'rules' => [
                    [                        
                        'allow' => true,
                        'roles' => ['@'],
                    ],                    
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Portfolio models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PortfolioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Portfolio model.
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
     * Creates a new Portfolio model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Portfolio();

        if ($model->load(Yii::$app->request->post())) {
            //$model->upload();
            $image = UploadedFile::getInstance($model, 'thumbnail');
            $model->thumbnail = rand(10000, 99999) . $image->name;
            $path = Yii::$app->basePath . '/web/uploads/portfolio/' . $model->thumbnail;
            if ($model->save()) {
                $image->saveAs($path);
            }
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Portfolio model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {        
        $model = $this->findModel($id);
        $l_logo = $model->thumbnail;
        if ($model->load(Yii::$app->request->post())) {            
            //$model->upload();
            $image = UploadedFile::getInstance($model, 'thumbnail');
            $path = Yii::$app->basePath . '/web/uploads/portfolio/';
            if ($image) {
                if (file_exists($path . $l_logo)) {
                    unlink($path . $l_logo);
                }
                $model->thumbnail = rand(10000, 99999) . $image->name;
            } else {
                $model->thumbnail = $l_logo;
            }
            if ($model->save()) {
                if ($image)
                    $image->saveAs($path . $model->thumbnail);
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Portfolio model.
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
            break;
        case 2:
            $filename = yii::getAlias('@root_path') . $model->image_2;
            if (is_file($filename)) {
                unlink(yii::getAlias('@root_path') . $model->image_2);
                $model->image_2 = "";
                $model->save();
            }
            break;
        case 3:
            $filename = yii::getAlias('@root_path') . $model->image_3;
            if (is_file($filename)) {
                unlink(yii::getAlias('@root_path') . $model->image_3);
                $model->image_3 = "";
                $model->save();
            }
            break;
        case 4:
            $filename = yii::getAlias('@root_path') . $model->thumbnail;
            if (is_file($filename)) {
                unlink(yii::getAlias('@root_path') . $model->thumbnail);
                $model->thumbnail = "";
                $model->save();
            }
            break;        
        default:
            # code...
            break;
        }
        return $this->redirect(['update', 'id' => $model->id]);
    }

    /**
     * Finds the Portfolio model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Portfolio the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Portfolio::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
