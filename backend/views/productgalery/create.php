<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Productgalery */

$this->title = 'Create Productgalery';
$this->params['breadcrumbs'][] = ['label' => 'Productgaleries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="productgalery-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
