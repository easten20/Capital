<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Cofounder */

$this->title = 'Create Cofounder';
$this->params['breadcrumbs'][] = ['label' => 'Cofounders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cofounder-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
