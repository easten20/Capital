<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Product;

/**
 * ProductSearch represents the model behind the search form about `common\models\Product`.
 */
class ProductSearch extends Product
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'categoryId'], 'integer'],
            [['itemNo', 'name', 'description', 'frequency', 'power', 'voltage', 'efficiency', 'consumption', 'consumption_lamp', 'luminous', 'luminous_lamp', 'cri', 'pfc', 'cutout', 'angle', 'dimension', 'cob_light_source', 'tj', 'protect_grade', 'environment', 'storage', 'lifespan', 'material', 'image_1', 'image_2', 'image_3', 'image_4', 'image_5'], 'safe'],
            [['weight'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
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
    public function search($params)
    {
        $query = Product::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'categoryId' => $this->categoryId,
            'weight' => $this->weight,
        ]);

        $query->andFilterWhere(['like', 'itemNo', $this->itemNo])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'frequency', $this->frequency])
            ->andFilterWhere(['like', 'power', $this->power])
            ->andFilterWhere(['like', 'voltage', $this->voltage])
            ->andFilterWhere(['like', 'efficiency', $this->efficiency])
            ->andFilterWhere(['like', 'consumption', $this->consumption])
            ->andFilterWhere(['like', 'consumption_lamp', $this->consumption_lamp])
            ->andFilterWhere(['like', 'luminous', $this->luminous])
            ->andFilterWhere(['like', 'luminous_lamp', $this->luminous_lamp])
            ->andFilterWhere(['like', 'cri', $this->cri])
            ->andFilterWhere(['like', 'pfc', $this->pfc])
            ->andFilterWhere(['like', 'cutout', $this->cutout])
            ->andFilterWhere(['like', 'angle', $this->angle])
            ->andFilterWhere(['like', 'dimension', $this->dimension])
            ->andFilterWhere(['like', 'cob_light_source', $this->cob_light_source])
            ->andFilterWhere(['like', 'tj', $this->tj])
            ->andFilterWhere(['like', 'protect_grade', $this->protect_grade])
            ->andFilterWhere(['like', 'environment', $this->environment])
            ->andFilterWhere(['like', 'storage', $this->storage])
            ->andFilterWhere(['like', 'lifespan', $this->lifespan])
            ->andFilterWhere(['like', 'material', $this->material])
            ->andFilterWhere(['like', 'image_1', $this->image_1])
            ->andFilterWhere(['like', 'image_2', $this->image_2])
            ->andFilterWhere(['like', 'image_3', $this->image_3])
            ->andFilterWhere(['like', 'image_4', $this->image_4])
            ->andFilterWhere(['like', 'image_5', $this->image_5]);

        return $dataProvider;
    }
}
