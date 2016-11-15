<?php

namespace frontend\controllers;

use Yii;
use common\models\BrandType;
use common\models\Product;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class BrandController extends Controller {

    public function behaviors() {
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
            ],
        ];
    }

    /**
     * Lists all Product models.
     * @param string category
     * @return mixed
     */
    public function actionView($brand = "") {
        $this->layout = 'plain';
        $brand = strtolower($brand);
        $model = $this->findModel($brand);
       
        $query = Product::find()->where(['brandTypeId' => $model->id]);
        $countQuery = clone $query;
        $products = $query->limit(3)->all(); 
        
        return $this->render("index", [
                    'model' => $model,
                    'products' => $products,
        ]);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($brandName) {
        if (($model = BrandType::findOne(['brandName' => $brandName])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}