<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Productgalery */

$this->title = 'Update Productgalery: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Productgaleries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="productgalery-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
