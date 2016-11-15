<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Portfoliogalery */

$this->title = $model->portfolio->name;
$this->params['breadcrumbs'][] = ['label' => 'Portfoliogaleries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portfoliogalery-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'portfolio.name',
         //   'image',
            [
                'attribute' => 'image',
                'value' => Yii::$app->request->BaseUrl . '/uploads/portfolio/' . $model->image,
                'format' => ['image', ['width' => '300px']],
            ],
            'information',
        ],
    ]) ?>

</div>
