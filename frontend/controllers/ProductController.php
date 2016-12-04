<?php

namespace frontend\controllers;

use common\models\Category;
use common\models\Product;
use common\models\ProductSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\base\Model;
use yii\data\ActiveDataProvider;
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

		$params = Yii::$app->request->queryParams;
		$categoryId = null;
		$query = Product::find();

		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);		
		$dataProvider->pagination = array('pageSize' => 9, 'route' => 'product');				
		
		if (isset($params['category']) && !empty($params['category'])) {
			$array_categoryId=array();
			$subCategories = Category::find()->where(['=', 'lvl', $params['category']])->all();					
			foreach($subCategories as $category) {
				array_push($array_categoryId,$category->id);
			}
			//var_dump($array_categoryId);
			$dataProvider->query->andFilterWhere(['in', 'categoryId', $array_categoryId]);
		}
		else {
			$subCategories = Category::find()->all();
		}
		if (isset($params['subcategory']) && !empty($params['subcategory'])) {
			$dataProvider->query->andFilterWhere(['=', 'categoryId', $params['subcategory']]);	
		}

		if (isset($params['name']) && !empty($params['name'])) {
			$dataProvider->query->andFilterWhere(['like', 'itemNo', $params['name']]);	
		}

		return $this->render('index', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
			'categoryId' => $categoryId,
			'subCategories' => $subCategories
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
