<?php

namespace common\models;

use common\models\Product;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * ProductSearch represents the model behind the search form about `common\models\Product`.
 */
class ProductSearch extends Product {
	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
			[['id', 'brandTypeId', 'categoryId', 'power', 'cri', 'cutout', 'angle', 'ledChip'], 'integer'],
			[['itemNo', 'luminous', 'dimension'], 'safe'],
			[['pfc'], 'number'],
			[['brandType'], 'safe'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function scenarios() {
		// bypass scenarios() implementation in the parent class
		return Model::scenarios();
	}

	/**
	 * Creates data provider instance with search query applied
	 *
	 * @param array $params
	 *
	 * @return ActiveDataProvider
	 */
	public function search($params) {
		$query = Product::find();

		$dataProvider = new ActiveDataProvider([
			'query' => $query,
		]);

		$this->load($params);

		if (!$this->validate()) {
			// uncomment the following line if you do not want to return any records when validation fails
			// $query->where('0=1');
			return $dataProvider;
		}

		$query->andFilterWhere([
			'id' => $this->id,
			'brandTypeId' => $this->brandTypeId,
			'categoryId' => $this->categoryId,
			'power' => $this->power,
			'cri' => $this->cri,
			'pfc' => $this->pfc,
			'cutout' => $this->cutout,
			'angle' => $this->angle,
			'ledChip' => $this->ledChip,
			'dimension' => $this->dimension,
		]);

		$query->andFilterWhere(['like', 'itemNo', $this->itemNo])
			->andFilterWhere(['like', 'luminous', $this->luminous]);

		return $dataProvider;
	}
}
