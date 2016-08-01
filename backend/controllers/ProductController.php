<?php

namespace backend\controllers;

use common\models\Product;
use common\models\ProductSearch;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends Controller {
	public function behaviors() {
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
	 * Lists all Product models.
	 * @return mixed
	 */
	public function actionIndex() {
		$searchModel = new ProductSearch();
		$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
		$dataProvider->pagination = array('pageSize' => 10);

		return $this->render('index', [
			'searchModel' => $searchModel,
			'dataProvider' => $dataProvider,
		]);
	}

	/**
	 * Displays a single Product model.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionView($id) {
		return $this->render('view', [
			'model' => $this->findModel($id),
		]);
	}

	/**
	 * Creates a new Product model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 * @return mixed
	 */
	public function actionCreate() {
		$model = new Product();

		if ($model->load(Yii::$app->request->post()) && $model->validate()) {
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
	 * Updates an existing Product model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionUpdate($id) {
		$model = $this->findModel($id);

		if ($model->load(Yii::$app->request->post()) && $model->validate()) {
			$model->imageFile1 = UploadedFile::getInstance($model, 'imageFile1');
			$model->upload();
			$model->save();
			return $this->redirect(['view', 'id' => $model->id]);
		} else {
			return $this->render('update', [
				'model' => $model,
			]);
		}
	}

	/**
	 * Deletes an existing Product model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id
	 * @return mixed
	 */
	public function actionDelete($id) {
		$this->findModel($id)->delete();

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
			$filename = yii::getAlias('@root_path') . $model->image_4;
			if (is_file($filename)) {
				unlink(yii::getAlias('@root_path') . $model->image_4);
				$model->image_4 = "";
				$model->save();
			}
			break;
		case 5:
			$filename = yii::getAlias('@root_path') . $model->image_5;
			if (is_file($filename)) {
				unlink(yii::getAlias('@root_path') . $model->image_5);
				$model->image_5 = "";
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

	/**
	 * @param $model
	 */
	protected function uploadProductImages($model) {
		$model->image_1 = UploadedFile::getInstance($model, 'image_1');
		if (isset($model->image_1)) {
			$model->upload();
		}

	}
}
