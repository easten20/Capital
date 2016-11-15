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
$this->params['breadcrumbs'][] = $this->title;
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
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} {delete}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a(' <span class="glyphicon glyphicon-eye-open"></span> ', $url, [
                                    'title' => Yii::t('yii', 'View'),
                                    'class' => 'btn btn-xs btn-success'
                        ]);
                    },
                    'update' => function ($url, $model) {
                        return Html::a(' <span class="glyphicon glyphicon-pencil"></span> ', $url, [
                                    'title' => Yii::t('yii', 'Update'),
                                    'class' => 'btn btn-xs btn-warning'
                        ]);
                    },
                    'delete' => function ($url, $model) {
                        return Html::a(' <span class="glyphicon glyphicon-trash"></span> ', $url, [
                                    'title' => Yii::t('yii', 'Delete'),
                                    'class' => 'btn btn-xs btn-danger'
                        ]);
                    }
                ]
            ],
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{galeri}',
                'buttons' => [
                    'galeri' => function ($url = null, $model) {
                        return Html::a('<span class="glyphicon glyphicon-picture"></span> ', $url = 'index.php?r=productgalery/index&productId=' . $model->id . '', [
                                    'title' => Yii::t('yii', 'Galeri'),
                                    'class' => 'btn btn-xs btn-primary'
                        ]);
                    }
                ]
            ],
        ],
    ]);
    ?>

</div>
