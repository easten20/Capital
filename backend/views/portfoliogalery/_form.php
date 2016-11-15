<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model common\models\Portfoliogalery */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="portfoliogalery-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>  

    <?=
    $form->field($model, 'image')->widget(FileInput::classname(), [
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
                    'attribute' => 'image',
                    'value' => Yii::$app->request->BaseUrl . '/uploads/portfolio/' . $model->image,
                    'format' => ['image', ['width' => '300px']],
                ],
            ],
        ]);
    }
    ?>

    <?= $form->field($model, 'information')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
