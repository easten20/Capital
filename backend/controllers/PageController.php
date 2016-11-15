<?php
namespace backend\controllers;

use Yii;
use common\models\Page;
use common\models\PageSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
/**
 * PageController implements the CRUD actions for Page model.
 */
class PageController extends Controller
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
     * Lists all Page models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PageSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Page model.
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
     * Creates a new Page model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Page();
        
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $image = UploadedFile::getInstance($model, 'image_1');            
            $model->image_1 = rand(10000, 99999) . $image->name;
            $path = Yii::$app->basePath . '/web/uploads/page/' . $model->image_1;            
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
     * Updates an existing Page model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        
        $l_image = $model->image_1;
        if ($model->load(Yii::$app->request->post())) {
            $image = UploadedFile::getInstance($model, 'image_1');
            $path = Yii::$app->basePath . '/web/uploads/page/';
            if ($image) {
                
                if (file_exists($path . $l_image)) { print_r($path . $l_image); die();
                    unlink($path . $l_image);
                }
                $model->image_1 = rand(10000, 99999) . $image->name;
            } else {
                $model->image_1 = $l_image;
            }
            if ($model->save()) {
                if ($image)
                    $image->saveAs($path . $model->image_1);
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Page model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $path = Yii::$app->basePath . '/web/uploads/page/';
        if (file_exists($path . $model->image_1)) {
            unlink($path . $model->image_1);
        }
        $model->delete();


        return $this->redirect(['index']);
    }

    /**
     * Finds the Page model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Page the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Page::findOne($id)) !== null) {
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
            break;        
        default:
            # code...
            break;
        }
        return $this->redirect(['update', 'id' => $model->id]);
    }
}
