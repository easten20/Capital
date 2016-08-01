<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\assets\CanvasAsset;
use frontend\assets\IndexAsset;
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;

//AppAsset::register($this);
CanvasAsset::register($this);
IndexAsset::register($this);
?>
<?php $this->beginPage()?>
<!DOCTYPE html>
<html lang="<?=Yii::$app->language?>">
<head>
    <meta charset="<?=Yii::$app->charset?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?=Html::csrfMetaTags()?>
    <title><?=Html::encode($this->title)?></title>
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
    <?php $this->head()?>
</head>
<body class="stretched">
<?php $this->beginBody()?>

<div id="wrapper" class="clearfix">

   	<?php $this->beginContent("@app/views/layouts/nav.php");?>

		<?php $this->endContent();?>



		<!-- Page Title
		============================================= -->
		<div class="dark">
		<section id="page-title">

			<div class="container clearfix">
				<h1><?=$this->title?></h1>
				<!-- <span>test</span> -->
				<!-- <ol class="breadcrumb">
					<li><a href="#">Home</a></li>
					<li class="active"><?=$this->title?></li>
				</ol>-->
				 <?=Breadcrumbs::widget([
	'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
])?>
			</div>

		</section><!-- #page-title end -->
		</div>

<section id="content">
			<div class="content-wrap">                	
                   <?=$content?>                   
            </div>
</section><!-- #content end -->



        <? // $content ?>


		<!-- Footer
		============================================= -->
		<footer id="footer" class="dark">
			
			<!-- Copyrights
			============================================= -->
			<div id="copyrights">

				<div class="container clearfix">

					<div class="col_half">
						Copyrights &copy; 2016 All Rights Reserved by Capital Lighting Inc.<br>
						<div class="copyright-links"><a href="#">Terms of Use</a> / <a href="#">Privacy Policy</a></div>
					</div>

					<div class="col_half col_last tright">
						<div class="fright clearfix">
							<a href="https://www.facebook.com/capitalindonesia/" class="social-icon si-small si-borderless si-facebook">
								<i class="icon-facebook"></i>
								<i class="icon-facebook"></i>
							</a>
					
						</div>

						<div class="clear"></div>

						<i class="icon-envelope2"></i> info@capitalelectric.co.id  
					</div>

				</div>

			</div><!-- #copyrights end -->

		</footer><!-- #footer end -->

</div>
<?php $this->endBody()?>
</body>
</html>
<?php $this->endPage()?>
