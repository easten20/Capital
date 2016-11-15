<?php

namespace frontend\controllers;

use common\models\Category;
use common\models\Tree;
use common\models\Product;
use common\models\ProductSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller {

    public function behaviors() {
        return [
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
    public function actionIndex() {
        $this->layout = 'default';
        $searchModel = new ProductSearch();
        $products = Product::find()->joinwith('productcategories');
        $params = Yii::$app->request->queryParams;

        //unset Category
        if (isset($params["ProductSearch"]["categoryId"])) {
            $categoryId = $params["ProductSearch"]["categoryId"];
            unset($params["ProductSearch"]["categoryId"]);

            //build query for the data provider
//			$subQuery = Category::find()->select('id')->where(['=', 'id', $categoryId]);
//			$query = Category::find()->select('id')->where(['in', 'parentId', $subQuery]);
//			$query = $query->OrFilterWhere(['=', 'id', $categoryId]); //add its own category

            $cproduct = Tree::find()->where(['id' => $categoryId])->one();
            $acproduct = Tree::find()
                    ->where('root = ' . $cproduct->root . ' and lvl =' . ($cproduct->lvl + 1) . ' and lft between ' . $cproduct->lft . ' and ' . $cproduct->rgt . ' and rgt between ' . $cproduct->lft . ' and ' . $cproduct->rgt . '')
                    ->all();
            $id_anak = [];
            foreach ($acproduct as $v) {
                $id_anak[] = $v->id;
            }
            if (count($id_anak) > 0)
                $products = $products->where(['in', 'categoryproduct.categoryId', $id_anak]);
            $products = $products->all();
            
//            $query = Category::find()->select('id')->where(['in', 'parentId', $subQuery]);
//            $query = $query->OrFilterWhere(['=', 'id', $categoryId]); //add its own category
        }

        $dataProvider = $searchModel->search($params);
        $dataProvider->pagination = array('pageSize' => 9, 'route' => 'product');
//        if (isset($query)) {
//            $dataProvider->query->andFilterWhere(['in', 'categoryId', $query]);
//        }

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'products' => $products
        ]);
    }

    /**
     * Displays a single Product model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($itemNo = "") {
        $this->layout = 'default';
        return $this->render('view', [
                    'model' => $this->findModelByItemNo($itemNo),
        ]);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findModelByItemNo($itemNo) {
        if (($model = Product::find()->where(['itemNo' => $itemNo])->one()) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
