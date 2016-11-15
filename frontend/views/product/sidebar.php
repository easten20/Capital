<?php
use yii\helpers\ArrayHelper;
use yii\helpers\BaseHtml;
use yii\helpers\Url;

$data_brand = ArrayHelper::map(\common\models\BrandType::find()->
		all(), 'id', 'brandName');
//$data_category = ArrayHelper::map(\common\models\Category::find()->where(['in', 'parentId', [1, 2]])->all(), 'id', 'name');
$data_category = ArrayHelper::map(\common\models\Tree::find()->where(['lvl' => 1])->all(), 'id', 'name');
?>
<!-- Sidebar ============================================= -->
<div class="sidebar nobottommargi#n">
    <div class="sidebar-widgets-wrap">
        <div id="side-navigation">
            <h4 class="search_title">
                PRODUCT FILTER
            </h4>             
            <div class="search_filter">
                <div class="search_field">
                    <p>
                        Product Name
                    </p>
                    <?=BaseHtml::textInput('name', null, [
	'class' => 'form-control search_input',
	'id' => 'filterName',
	'onchange' => 'searchFilter()',
])?>
                </div>
                <div class="search_field">
                    <p>
                        Brand
                    </p>
                    <?=BaseHtml::dropDownList('brand', null, $data_brand, ['prompt' =>
	'- select group -',
	'class' => 'form-control search_input',
	'id' => 'filterBrand',
	'onchange' => 'searchFilter()',
])?>
                </div>
                <div class="search_field">
                    <p>
                        Category
                    </p>
                    <?=BaseHtml::dropDownList('category', null, $data_category, ['prompt' =>
	'- select group -',
	'class' => 'form-control search_input',
	'id' => 'filterCategory',
	'onchange' => 'searchFilter()',

])?>
                </div>
            </div>                
        </div>
    </div>
</div>
<!-- .sidebar end -->
<script>
    function searchFilter() {

			//get all value from element
			var category = $('#filterCategory').val();
			var brand = $('#filterBrand').val();
			var name = $('#filterName').val();
			var queryString = '<?=Url::to('@web/product/', true);?>?';
			if (category) {
	            queryString +=  "&ProductSearch[categoryId]=" + category;
	        }
			if (brand) {
	            queryString +=  "&ProductSearch[brandTypeId]=" + brand;
	        }
	        if (name) {
	            queryString +=  "&ProductSearch[itemNo]=" + name;
	        }

			if ((category || brand) == false) {
	            queryString = queryString.substring(0,queryString.length-1);
	        }

			$.pjax.reload({
					url: queryString,
				    container: "#pjax-shop",
				    timeout: 1000,
			});

	    }


	        $(".search_title").click(function(){
				$('.search_filter').slideToggle("slow");
			})
</script>
