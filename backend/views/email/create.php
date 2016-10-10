<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\BrandType */

$this->title = 'E-mail';
$this->params['breadcrumbs'][] = ['label' => 'E-mail', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="brand-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
