<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\components\Helpers;
use kartik\tree\TreeViewInput;
use app\models\Tree;

/* @var $this yii\web\View */
/* @var $model common\models\Product */
/* @var $form yii\widgets\ActiveForm */
$dataCategoryBrand = ArrayHelper::map(\common\models\BrandType::find()->asArray()->all(), 'id', 'brandName');
$dataCategoryCategories = ArrayHelper::map(\common\models\Category::find()->asArray()->all(), 'id', 'name');
?>
<div class="product-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    
    <?= $form->field($model, 'brandTypeId')->dropDownList($dataCategoryBrand, ['prompt' => '--Choose a Brand--']) ?>
    <label class="control-label" for="product-brandtypeid">Category</label>
    <?php
    echo TreeViewInput::widget([
        // single query fetch to render the tree
        // use the Product model you have in the previous step
        'query' => Tree::find()->addOrderBy('root, lft'),
        'headingOptions' => ['label' => 'Categories'],
        'name' => 'categoryId', // input name
        'value' => $category, // values selected (comma separated for multiple select)
        'asDropdown' => true, // will render the tree input widget as a dropdown.
        'multiple' => true, // set to false if you do not need multiple selection
        'fontAwesome' => true, // render font awesome icons
        'rootOptions' => [
            'label' => '<i class="fa fa-tree"></i>', // custom root label
            'class' => 'text-success'
        ],
            //'options'=>['disabled' => true],
    ]);
    ?>
    <br/>
    <?= $form->field($model, 'itemNo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->widget(\yii\redactor\widgets\Redactor::className()) ?>

    <?= $form->field($model, 'power')->textInput() ?>

    <?= $form->field($model, 'luminous')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cri')->textInput() ?>

    <?= $form->field($model, 'pfc')->textInput() ?>

    <?= $form->field($model, 'cutout')->textInput() ?>

    <?= $form->field($model, 'angle')->textInput() ?>

    <?= $form->field($model, 'ledChip')->textInput() ?>

    <?= $form->field($model, 'dimension')->textInput() ?>  


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

