<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\brandTypeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Brand Types';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="brand-type-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Brand Type', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
          //  'id',
            'brandName',
            'description',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
