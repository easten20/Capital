<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Portfolio */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Portfolios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portfolio-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])
        ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            'location',
            [
                'attribute' => 'thumbnail',
                'value' => Yii::$app->request->BaseUrl . '/uploads/portfolio/' . $model->thumbnail,
                'format' => ['image', ['width' => '300px']],
            ],
            
        ],
    ])
    ?>

</div>
