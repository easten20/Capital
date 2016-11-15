<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Cofounder */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Cofounders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cofounder-view">

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
            'description:ntext',
            [
                'attribute' => 'image_1',
                'value' => Yii::$app->request->BaseUrl . '/uploads/cofounder/' . $model->image_1,
                'format' => ['image', ['width' => '300px']],
            ],
        ],
    ])
    ?>

</div>
