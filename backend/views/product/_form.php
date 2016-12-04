<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\components\Helpers;
/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $form yii\widgets\ActiveForm */
//$dataCategoryBrand = ArrayHelper::map(\common\models\BrandType::find()->asArray()->all(), 'id', 'brandName');
$dataCategoryCategories = ArrayHelper::map(\common\models\Category::find()->asArray()->all(), 'id', 'name');
?>
<div class="product-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]);?>

    <?php //$form->field($model, 'brandTypeId')->dropDownList($dataCategoryBrand, ['prompt' => '--Choose a Brand--'])?>

    <?=$form->field($model, 'categoryId')->dropDownList($dataCategoryCategories, ['prompt' => '--Choose a Category--'])?>    
    
    <?=$form->field($model, 'itemNo')->textInput(['maxlength' => true])?>

    <?=$form->field($model, 'name')->textInput()?>

    <?=$form->field($model, 'description')->widget(\yii\redactor\widgets\Redactor::className())?>    

    <?=$form->field($model, 'voltage')->textInput()?>

    <?=$form->field($model, 'frequency')->textInput()?>    

    <?=$form->field($model, 'power')->textInput()?>

    <?=$form->field($model, 'efficiency')->textInput()?>

    <?=$form->field($model, 'consumption')->textInput()?>

    <?=$form->field($model, 'consumption_lamp')->textInput()?>

    <?=$form->field($model, 'luminous')->textInput(['maxlength' => true])?>

    <?=$form->field($model, 'luminous_lamp')->textInput()?>

    <?=$form->field($model, 'cri')->textInput()?>    

    <?=$form->field($model, 'angle')->textInput()?>  

    <?=$form->field($model, 'cob_light_source')->textInput()?>  

    <?=$form->field($model, 'tj')->textInput()?>      

    <?=$form->field($model, 'protect_grade')->textInput()?>      

    <?=$form->field($model, 'environment')->textInput()?>  

    <?=$form->field($model, 'storage')->textInput()?>  

    <?=$form->field($model, 'lifespan')->textInput()?>  

    <?=$form->field($model, 'material')->textInput()?>  

    <?=$form->field($model, 'dimension')->textInput()?>

    <?=$form->field($model, 'weight')->textInput()?>  

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

    <?=$form->field($model, 'imageFile2')->fileInput()?>
<?php if (isset($model->image_2) && !empty($model->image_2)) {
	?>
    <div class="form-group">
    <?=Html::img($model->image_2, ['alt' => 'some', 'height' => '200']);?>
    <?=Html::a('<span class="glyphicon glyphicon-trash"></span>', ["remove", "id" => $model->id, "imageId" => 2], [
		'title' => \Yii::t('yii', 'RemoveImage'),
		'data-confirm' => \Yii::t('yii', 'Are you sure to delete this item?'),
		'data-method' => 'post',
		'data-pjax' => '0',
		'style' => 'vertical-align:top;',
	]);?>
    </div>
    <?php }?>

    <?=$form->field($model, 'imageFile3')->fileInput()?>
    <?php if (isset($model->image_3) && !empty($model->image_3)) {
	?>
    <div class="form-group">
    <?=Html::img($model->image_3, ['alt' => 'some', 'height' => '200']);?>
    <?=Html::a('<span class="glyphicon glyphicon-trash"></span>', ["remove", "id" => $model->id, "imageId" => 3], [
		'title' => \Yii::t('yii', 'RemoveImage'),
		'data-confirm' => \Yii::t('yii', 'Are you sure to delete this item?'),
		'data-method' => 'post',
		'data-pjax' => '0',
		'style' => 'vertical-align:top;',
	]);?>
    </div>
    <?php }?>

    <?=$form->field($model, 'imageFile4')->fileInput()?>
    <?php if (isset($model->image_4) && !empty($model->image_4)) {
	?>
    <div class="form-group">
    <?=Html::img($model->image_4, ['alt' => 'some', 'height' => '200']);?>
    <?=Html::a('<span class="glyphicon glyphicon-trash"></span>', ["remove", "id" => $model->id, "imageId" => 4], [
		'title' => \Yii::t('yii', 'RemoveImage'),
		'data-confirm' => \Yii::t('yii', 'Are you sure to delete this item?'),
		'data-method' => 'post',
		'data-pjax' => '0',
		'style' => 'vertical-align:top;',
	]);?>
    </div>
    <?php }?>

    <?=$form->field($model, 'imageFile5')->fileInput()?>
    <?php if (isset($model->image_5) && !empty($model->image_5)) {
	?>
    <div class="form-group">
    <?=Html::img($model->image_5, ['alt' => 'some', 'height' => '200']);?>
    <?=Html::a('<span class="glyphicon glyphicon-trash"></span>', ["remove", "id" => $model->id, "imageId" => 5], [
		'title' => \Yii::t('yii', 'RemoveImage'),
		'data-confirm' => \Yii::t('yii', 'Are you sure to delete this item?'),
		'data-method' => 'post',
		'data-pjax' => '0',
		'style' => 'vertical-align:top;',
	]);?>
    </div>
    <?php }?>


    <div class="form-group">
        <?=Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary'])?>
    </div>

    <?php ActiveForm::end();?>

</div>

<script type="text/javascript">
    $(function () {
        $("#tree").jstree({
        "checkbox": {
            "keep_selected_style": false
        },
            "plugins": ["checkbox"]
    });
    $("#tree").bind("changed.jstree",
    function (e, data) {
        alert("Checked: " + data.node.id);
        alert("Parent: " + data.node.parent); 
        //alert(JSON.stringify(data));
    });
});
</script>