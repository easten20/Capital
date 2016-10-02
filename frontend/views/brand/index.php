<?php
use frontend\assets\ProductAsset;
use yii\helpers\Url;

$this->title = $model->brandName;
$this->params['breadcrumbs'][] = $this->title;

ProductAsset::register($this);


//seo meta tags
$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Capital - Special Brand ' . $model->brandName,
]);
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => $model->brandName. ',Lighting, Indonesia, Architectural, Art, Design',
]);

$this->registerMetaTag([
    'name' => 'robots',
    'content' => 'index,follow',
]);
?>





  <section id="content">
						<div class="clearfix">
						<div class="full-screen" style="background-image: url('<?=Url::to($model->image_1, true);?>'); background-size: cover; background-repeat:no-repeat;" data-height-lg="450" data-height-md="400" data-height-sm="300" data-height-xs="200" data-height-xxs="125">

					</div>


			     <!-- <a href="#" data-scrollto="#content" data-offset="100" class="dark one-page-arrow"><i class="icon-angle-down infinite animated fadeInDown"></i></a> -->
				  </div>
                	<div class="section parallax dark nobottommargin notopmargin">
						<div class="container clearfix">
							<div class="col-lg-5">
								<div class="topmargin bottommargin">
									<img height= "100" src= "<?=Url::to($model->logo, true);?>" alt="Crescent"> </img>
								</div>
									<p class="lead"><?= $model->description ?></p>
							</div>
						</div>
					</div>

			<div class="section nobottommargin nobottomborder">
					<div class="container clearfix">
						<div class="heading-block center nomargin">
							<h3>Products</h3>
						</div>
					</div>
			</div>

		   <div class="container clearfix topmargin">
					<div class="row clearfix centered">
						<!-- Shop
						============================================= -->
						<div class="product_brand">
							<?php foreach ($products as $product) {?>
							<div class="product clearfix">
								<div class="product-image">
									<a href="<?=Url::to('@web/product/' . $product->itemNo, true);?>"><img src="<?=Url::to($product->image_1, true);?>"  alt="<?=$product->itemNo?>"></a>
								</div>
								<div class="product-desc center">
									<div class="product-title"><h3><a href="<?=Url::to('@web/product/' . $product->itemNo, true);?>"><?=$product->itemNo?></a></h3></div>
								</div>
							</div>
							<?php }?>

						</div><!-- #shop end -->

					</div>
		    </div>

		   <a href="<?=Url::to('@web/product/?ProductSearch[categoryId]=' . $model->id, true);?>"class="button button-full button-dark center tright">
					<div class="container clearfix">
						More Products...
					</div>
			</a>

</section><!-- #content end -->