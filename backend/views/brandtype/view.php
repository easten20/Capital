<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\BrandType */

$this->title = $model->brandName;
$this->params['breadcrumbs'][] = ['label' => 'Brand Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="brand-type-view">

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
            'brandName',            
            'description:ntext',
            
            [
                'attribute' => 'logo',
                'value' => Yii::$app->request->BaseUrl . '/uploads/brand/' . $model->logo,
                'format' => ['image', ['width' => '300px']],
            ],
            [
                'attribute' => 'image_1',
                'value' => Yii::$app->request->BaseUrl . '/uploads/brand/' . $model->image_1,
                'format' => ['image', ['width' => '300px']],
            ],
        ],
    ]) ?>

</div>
