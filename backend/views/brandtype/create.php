<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\BrandType */

$this->title = 'Create Brand Type';
$this->params['breadcrumbs'][] = ['label' => 'Brand Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="brand-type-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
