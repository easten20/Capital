<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Portfoliogalery */

$this->title = 'Update Portfoliogalery: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Portfoliogaleries', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="portfoliogalery-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
