<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model common\models\Portfolio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="portfolio-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'location')->textInput(['maxlength' => true]) ?>
    
    <?=
    $form->field($model, 'thumbnail')->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
    ])
    ?>

    <?php
    if (!($model->isNewRecord)) {
        ?>    
        <?=
        DetailView::widget([
            'model' => $model,
            'attributes' => [
                [
                    'attribute' => 'thumbnail',
                    'value' => Yii::$app->request->BaseUrl . '/uploads/portfolio/' . $model->thumbnail,
                    'format' => ['image', ['width' => '300px']],
                ],
            ],
        ]);
    }
    ?>




    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
