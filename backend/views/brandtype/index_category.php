<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\tree\TreeView;
use kartik\tree\TreeViewInput;
use app\models\Tree;

/* @var $this yii\web\View */
/* @var $searchModel common\models\brandTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Brand Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="brand-type-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>


    <?php
    echo TreeView::widget([
        // single query fetch to render the tree
        // use the Product model you have in the previous step
        'query' => Tree::find()->addOrderBy('root, lft'),
        'headingOptions' => ['label' => 'Categories'],
        'fontAwesome' => false, // optional
        'isAdmin' => false, // optional (toggle to enable admin mode)
        'displayValue' => 1, // initial display value
        'softDelete' => true, // defaults to true
        'cacheSettings' => [
            'enableCache' => true   // defaults to true
        ]
    ]);
    ?>

</div>
