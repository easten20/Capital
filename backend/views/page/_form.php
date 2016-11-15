<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model common\models\Page */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="page-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput() ?>

    <?= $form->field($model, 'title')->textInput() ?>    

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>      

    <?=
    $form->field($model, 'image_1')->widget(FileInput::classname(), [
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
                    'attribute' => 'image_1',
                    'value' => Yii::$app->request->BaseUrl . '/uploads/page/' . $model->image_1,
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
