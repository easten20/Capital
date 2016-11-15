<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Portfoliogalery */

$this->title = 'Create Portfoliogalery';
$this->params['breadcrumbs'][] = ['label' => 'Portfoliogaleries', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="portfoliogalery-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
