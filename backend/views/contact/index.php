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

    <h1><?= Html::encode($this->title) ?></h1>
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
                'template' => '{view}{delete}',
            ],
        ],
    ]);
    ?>

</div>
