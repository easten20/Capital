<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PortfoliogalerySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Portfoliogaleries';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portfoliogalery-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Portfoliogalery', ['create', 'portfolioId' => $portfolioId], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

      //      'id',
            'portfolio.name',
            'image',
            'information',

           // ['class' => 'yii\grid\ActionColumn'],
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
        ],
    ]); ?>
</div>
