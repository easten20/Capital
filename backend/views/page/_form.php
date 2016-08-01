<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Page */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="page-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput() ?>

    <?= $form->field($model, 'title')->textInput() ?>    

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>      

     <?=$form->field($model, 'imageFile1')->fileInput()?>

	<?php if (isset($model->image_1) && !empty($model->image_1)) {
    ?>
    <div class="form-group">
    <?=Html::img($model->image_1, ['alt' => 'some', 'height' => '200']);?>
    <?=Html::a('<span class="glyphicon glyphicon-trash"></span>', ["remove", "id" => $model->id, "imageId" => 1], [
        'title' => \Yii::t('yii', 'RemoveImage'),
        'data-confirm' => \Yii::t('yii', 'Are you sure to delete this item?'),
        'data-method' => 'post',
        'data-pjax' => '0',
        'style' => 'vertical-align:top;',
    ]);?>
    </div>
    <?php }?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
