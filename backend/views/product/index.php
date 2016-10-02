<?php

use yii\grid\GridView;
use yii\helpers\Html;
use kartik\tree\TreeView;
use kartik\tree\TreeViewInput;
use app\models\Tree;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?=
    GridView::widget([
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
            // [
            //  'attribute' => 'image_1',
            //'value' => 'image_1',
            //'format' => ['image', ['height' => '200']],
            //],
            // 'width',
            // 'length',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>

</div>
