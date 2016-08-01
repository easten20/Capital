<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Product */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <h1><?=Html::encode($this->title)?></h1>

    <p>
        <?=Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary'])?>
        <?=Html::a('Delete', ['delete', 'id' => $model->id], [
	'class' => 'btn btn-danger',
	'data' => [
		'confirm' => 'Are you sure you want to delete this item?',
		'method' => 'post',
	],
])?>
    </p>

    <?=DetailView::widget([
	'model' => $model,
	'attributes' => [
		'id',
		'brandTypeId',
		'categoryId',
		'itemNo',
		'description',
		'power',
		'luminous',
		'cri',
		'pfc',
		'cutout',
		'angle',
		'ledChip',
		'dimension',
		[
			'attribute' => 'image_1',
			'value' => $model->image_1,
			'format' => ['image', ['height' => '200']],
		],
		[
			'attribute' => 'image_2',
			'value' => $model->image_2,
			'format' => ['image', ['height' => '200']],
		],
		[
			'attribute' => 'image_3',
			'value' => $model->image_3,
			'format' => ['image', ['height' => '200']],
		],
		[
			'attribute' => 'image_4',
			'value' => $model->image_4,
			'format' => ['image', ['height' => '200']],
		],
		[
			'attribute' => 'image_5',
			'value' => $model->image_5,
			'format' => ['image', ['height' => '200']],
		],

	],
])?>

</div>
