<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Cofounder */

$this->title = 'Create Cofounder';
$this->params['breadcrumbs'][] = ['label' => 'Cofounders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cofounder-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
