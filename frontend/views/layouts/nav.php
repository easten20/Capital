
<?php use yii\helpers\Url;
use common\components\Helpers;
?>

<?php
$brands = \common\models\BrandType::find()->all();
$isTransparent = true;
?>

<!-- Header ============================================= -->
<?php

if (isset($isTransparent)) {?>
		<header id="header" class="transparent-header full-header" data-sticky-class="not-dark">
<?php } else {?>
<header id="header" class="full-header" data-sticky-class="not-dark">
<?php }?>

			<div id="header-wrap">

				<div class="container clearfix">

					<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

					<!-- Logo
					============================================= -->
					<div id="logo">
						<a href="#" class="standard-logo" data-dark-logo="<?=Url::to('@web/images/capital/logo_capital_dark_small.png', true);?>"><img src="<?=Url::to('@web/images/capital/logo_capital_small.png', true);?>" alt="Capital Lighting Logo"></a>
						<a href="'#" class="retina-logo" data-dark-logo="<?=Url::to('@web/images/capital/logo_capital_dark_2X.png', true);?>"><img src="<?=Url::to('@web/images/capital/logo_capital_small.png', true);?>" alt="Capital Lighting Logo"></a>
					</div><!-- #logo end -->

					<!-- Primary Navigation
					============================================= -->
					<nav id="primary-menu">

						<ul>
							<li><a href="<?=Url::to('@web/', true);?>"><div>Home</div></a></li>
							<li><a href="#"><div>Products</div></a>
								<ul>
      							<?= Helpers::categoryTreeBuild(); ?>
      							</ul>
      						</li>      													
							<!--<li><a href="#"><div>Projects</div></a>								
      							<ul>
												<?php foreach ($brands as $brand) {?>
													<li><a href="<?=Url::to('@web/brand/' . $brand->brandName, true);?>"><div><?=$brand->brandName?></div></a></li>
												<?php }?>
								</ul>      					
      						</li>							-->
							<li><a href="<?=Url::to('@web/site/about', true);?>"><div>About Us</div></a></li>
							<li><a href="<?=Url::to('@web/site/contact', true);?>"><div>Contact</div></a></li>
						</ul>

						<div id="top-search">
								<a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
								<form action="<?=Url::to('@web/product/', true);?>" method="get">
									<input type="text" name="name" class="form-control" value="" placeholder="Type &amp; Hit Enter..">
								</form>
							</div><!-- #top-search end -->
					</nav><!-- #primary-menu end -->

				</div>

			</div>

		</header><!-- #header end -->
