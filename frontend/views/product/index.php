<?php

use yii\widgets\Pjax;
use frontend\assets\ProductAsset;
use yii\helpers\Url;
use yii\widgets\LinkPager;

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

?>


<?php $this->title = "Products"; ?>

<div class="product-container container clearfix">

<!-- Post Content
					============================================= -->
					<div class="postcontent nobottommargin col_last">

<?php Pjax::begin(['id' => 'pjax-shop']) ?>
						<!-- Shop
						============================================= -->
						<div id="shop" class="product-3 clearfix">
							<?php foreach($dataProvider->getModels() as $product) { ?>
							<div class="product clearfix">
								<div class="product-image">									
									<a href="<?= Url::to('@web/product/'.$product->itemNo, true); ?>"><img src="<?= Url::to($product->image_1, true); ?>"  alt="<?= $product->itemNo ?>"></a>
								</div>
								<div class="product-desc center">
									<div class="product-title"><h3><a href="<?= Url::to('@web/product/'.$product->itemNo, true); ?>"><?= $product->itemNo ?></a></h3></div>									
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
					   	<?php $this->beginContent("@app/views/product/sidebar.php"); ?>
		
					<?php $this->endContent();?>

</div>
