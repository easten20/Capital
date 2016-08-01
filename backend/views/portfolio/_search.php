<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PortfolioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="portfolio-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'location') ?>

    <?= $form->field($model, 'thumbnail') ?>

    <?= $form->field($model, 'image_1') ?>

    <?php // echo $form->field($model, 'image_2') ?>

    <?php // echo $form->field($model, 'image_3') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
