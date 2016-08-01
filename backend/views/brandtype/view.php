<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\BrandType */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Brand Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="brand-type-view">

    <h1><?= Html::encode($this->title) ?></h1>

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
            'id',
            'brandName',            
            'description:ntext',
            [
            'attribute' => 'image1',
            'value' => $model->image_1,
            'format' => ['image', ['height' => '200']],
            ],
            [
            'attribute' => 'logo',
            'value' => $model->logo,
            'format' => ['image', ['height' => '200']],
            ],
        ],
    ]) ?>

</div>
