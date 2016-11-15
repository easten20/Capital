<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\BrandType */

$this->title = 'Update Brand Type: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Brand Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="brand-type-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
