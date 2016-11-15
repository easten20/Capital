<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PortfolioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Portfolios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portfolio-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Portfolio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'location',
            //[
            //'attribute' => 'thumbnail',
            //'value' => 'thumbnail',
            //'format' => ['image', ['height' => '200']],
            //],
            //'image_1',
            // 'image_2',
            // 'image_3',
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
                        return Html::a('<span class="glyphicon glyphicon-picture"></span> ', $url = 'index.php?r=portfoliogalery/index&portfolioId=' . $model->id . '', [
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
