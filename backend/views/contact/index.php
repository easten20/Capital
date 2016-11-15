<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ContactSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contacts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contact-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'name',
            'email:email',
            'subject',
            [
                'label' => 'Readed',
                'format' => 'raw',
                'value' => function($data) {
                    if ($data->is_readed == '1') $balik = '<i title="Read" class="fa fa-envelope-o" aria-hidden="true"></i>'; else $balik = '<i title="Unread" class="fa fa-envelope" aria-hidden="true"></i>';
                    return $balik;
                }
            ],
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view} {delete}',
                'buttons' => [
                    'view' => function ($url, $model) {
                        return Html::a(' <span class="glyphicon glyphicon-eye-open"></span> ', $url, [
                                    'title' => Yii::t('yii', 'View'),
                                    'class' => 'btn btn-xs btn-success'
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
