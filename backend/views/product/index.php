<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?=Html::encode($this->title)?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?=Html::a('Create Product', ['create'], ['class' => 'btn btn-success'])?>
    </p>

    <?=GridView::widget([
	'dataProvider' => $dataProvider,
	'filterModel' => $searchModel,
	'columns' => [
		['class' => 'yii\grid\SerialColumn'],
		'brandType.brandName',
		'category.name',
		'itemNo',
		//'image_1',
		'luminous',
		// 'cri',
		// 'pfc',
		// 'cutout',
		// 'angle',
		 [
            'attribute' => 'image_1',
            'value' => 'image_1',
            'format' => ['image', ['height' => '200']],
            ],
		// 'width',
		// 'length',

		['class' => 'yii\grid\ActionColumn'],
	],
]);?>

</div>
