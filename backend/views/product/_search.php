<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ProductSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'brandTypeId') ?>

    <?= $form->field($model, 'categoryId') ?>

    <?= $form->field($model, 'itemNo') ?>

    <?= $form->field($model, 'power') ?>

    <?php // echo $form->field($model, 'luminous') ?>

    <?php // echo $form->field($model, 'cri') ?>

    <?php // echo $form->field($model, 'pfc') ?>

    <?php // echo $form->field($model, 'cutout') ?>

    <?php // echo $form->field($model, 'angle') ?>

    <?php // echo $form->field($model, 'ledChip') ?>

    <?php // echo $form->field($model, 'width') ?>

    <?php // echo $form->field($model, 'length') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
