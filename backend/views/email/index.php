<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\brandTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Emails';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="brand-type-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Email', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //  'id',
            'email',
            [
                'label' => 'Get Info',
                'format' => 'raw',
                'value' => function($data) {
                    if ($data->get_info == '1')
                        $balik = '<i title="Get Info" class="fa fa-check" aria-hidden="true"></i>';
                    else
                        $balik = '<i title="Unget Info" class="fa fa-close" aria-hidden="true"></i>';
                    return $balik;
                }
            ],
            ['class' => 'yii\grid\ActionColumn',
                'template' => ' {update} {delete}',
                'buttons' => [
                    
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
    ]);
    ?>

</div>
