<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Cofounders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cofounder-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Cofounder', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           
            'name',
            'description:ntext',            

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view} {update} ',
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
                    
                ]
            ],
        ],
    ]); ?>

</div>
