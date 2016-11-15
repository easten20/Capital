<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Cofounder */

$this->title = 'Update Cofounder: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Cofounders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cofounder-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
