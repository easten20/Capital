<?php

use yii\widgets\Pjax;
use frontend\assets\ProductAsset;
use yii\helpers\Url;
use yii\widgets\LinkPager;
use yii\helpers\BaseHtml;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;

ProductAsset::register($this);
$this->title = "Products";
$this->params['breadcrumbs'][] = ['label' => 'Product', 'url' => ['index']];
$this->params['breadcrumbs'][] = "Index";

//seo meta tags
$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Capital - Product ',
]);
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => 'Downlight, Tracklight, Retrofit, Lighting, Architectural, Art, Design',
]);

$this->registerMetaTag([
    'name' => 'robots',
    'content' => 'index,follow',
]);


$data_brand = ArrayHelper::map(\common\models\BrandType::find()->
		all(), 'id', 'brandName');
$data_category = ArrayHelper::map(\common\models\Category::find()->where(['in', 'lvl', [0]])->all(), 'id', 'name');
$data_subcategory = ArrayHelper::map($subCategories, 'id', 'name');

$name = (isset(Yii::$app->request->queryParams['name']))?Yii::$app->request->queryParams['name']:"";
$category = (isset(Yii::$app->request->queryParams['category']))?Yii::$app->request->queryParams['category']:"";
$subcategory = (isset(Yii::$app->request->queryParams['subcategory']))?Yii::$app->request->queryParams['subcategory']:"";

?>



<?php  $this->title = "Products"; ?>
<div class="product-container container clearfix">
<!-- Sidebar ============================================= -->
<?php $form = ActiveForm::begin(['method' => 'GET', 'action' => './']); ?>
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
                    <?=BaseHtml::textInput('name', $name, [
	'class' => 'form-control search_input',
	'id' => 'filterName',
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
'options' =>
                    [                        
                      $category => ['selected' => true],                      
                    ]
          ]
)?>
                </div>
                <div class="search_field">
                    <p>
                        SubCategory
                    </p>
                    <?=BaseHtml::dropDownList('subcategory', null, $data_subcategory, ['prompt' =>
	'- select group -',
	'class' => 'form-control search_input',
	'id' => 'filterSubCategory',
	'onchange' => 'searchFilter()',
'options' =>
                    [                        
                      $subcategory => ['selected' => true],                      
                    ]          
])?>
                </div>
            </div>                
        </div>
    </div>
</div>
<?php ActiveForm::end(); ?>
<!-- .sidebar end -->
<?php Pjax::begin(['id' => 'pjax-shop']) ?>

<!-- Post Content
					============================================= -->
					<div class="postcontent nobottommargin col_last">

						<!-- Shop
						============================================= -->
						<div id="shop" class="product-3 clearfix">
							<?php foreach($dataProvider->getModels() as $product) { ?>
							<div class="product clearfix">
								<div class="product-image">									
									<a href="<?= Url::to('@web/product/'.$product->itemNo, true); ?>"><img src="<?= Url::to($product->image_1, true); ?>"  alt="<?= $product->itemNo ?>"></a>
								</div>
								<div class="product-desc center">
									<div class="product-title"><h3><a href="<?= Url::to('@web/product/'.$product->itemNo, true); ?>"><?= $product->name ?></a></h3></div>									
								</div>
							</div>
							<?php }	?>
							
						</div><!-- #shop end -->
						<div class="clearfix" style="float: left;" >
						<?php
							// display pagination
							echo LinkPager::widget([
								'pagination' => $dataProvider->pagination,
							]);
							?>
				        </div>
					</div><!-- .postcontent end -->


					
<?php Pjax::end() ?>					
</div>
<!-- .sidebar end -->
<script>
    function searchFilter() {

			//get all value from element
			/*var category = $('#filterCategory').val();
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
			});*/

	    }


	        $(".search_title").click(function(){
				$('.search_filter').slideToggle("slow");
			})

			  $('select').on('change', function(e){
    				this.form.submit()
  				});
</script>
