<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\assets\CanvasAsset;
use frontend\assets\IndexAsset;
use yii\helpers\Html;
use common\models\Page;
use yii\helpers\Url;

//AppAsset::register($this);
CanvasAsset::register($this);
IndexAsset::register($this);
$slider_1 = Page::findOne(['name' => 'slider_1']); 
$slider_2 = Page::findOne(['name' => 'slider_2']); 
$slider_3 = Page::findOne(['name' => 'slider_3']); 
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




		<?php $this->beginContent("@app/views/layouts/nav.php", ['isTransparent' => true]);?>
		<?php $this->endContent();?>


		<section id="slider" class="slider-parallax swiper_wrapper full-screen clearfix">
			<div class="swiper-container swiper-parent">
				<div class="swiper-wrapper">
					<div class="swiper-slide dark" style="background-image: url('<?= Url::to($slider_1->image_1, true); ?>');">
						<div class="container clearfix">
							<div class="slider-caption slider-caption-center">
								<h2 data-caption-animate="fadeInUp"><?= $slider_1->title ?></h2>
								<p data-caption-animate="fadeInUp" data-caption-delay="200">
									<?= $slider_1->description ?>								
								</p>
							</div>
						</div>
					</div>
					<div class="swiper-slide dark"  style="background-image: url('<?= Url::to($slider_2->image_1, true); ?>');" >
						<div class="container clearfix">
							<div class="slider-caption slider-caption-center">
								<h2 data-caption-animate="fadeInUp"><?= $slider_2->title ?></h2>
								<p data-caption-animate="fadeInUp" data-caption-delay="200">
									<?= $slider_2->description ?>	
								</p>
							</div>
						</div>
						<!-- <div class="video-wrap dark"> -->															
								<!-- <source src='images/capital/UE4_Archviz_Lighting_4.webm' type='video/webm' /> -->					
							<!-- <video id="slide-video" poster="" preload="auto" loop autoplay muted>
								<source src='images/capital/UE4_Archviz_Lighting_4.mp4' type='video/mp4' />								
							</video>
							<div class="video-overlay" style="background-color: rgba(0,0,0,0.55);"></div>
						</div>-->
					</div>
					<div class="swiper-slide dark" style="background-image: url('<?= Url::to($slider_3->image_1, true); ?>'); background-position: center top;">
						<div class="container clearfix">
							<div class="slider-caption">
								<h2 data-caption-animate="fadeInUp"><?= $slider_3->title ?></h2>
								<p data-caption-animate="fadeInUp" data-caption-delay="200">
									<?= $slider_3->description ?>									
								</p>
							</div>
						</div>
					</div>
				</div>
				<div id="slider-arrow-left"><i class="icon-angle-left"></i></div>
				<div id="slider-arrow-right"><i class="icon-angle-right"></i></div>
			</div>


			<a href="#" data-scrollto="#content" data-offset="100" class="dark one-page-arrow"><i class="icon-angle-down infinite animated fadeInDown"></i></a>

		</section>

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
                        Copyrights &copy; 2016 Dongguan CLED Optoelectronic Technology Co., Ltd - LED street light, LED tunnel light, LED outdoor light, LED indoor light All right reserved.<br>
                        <div class="copyright-links"><a href="#">Terms of Use</a> / <a href="#">Privacy Policy</a></div>
                    </div>

                    <div class="col_half col_last tright">
                        <div class="fright clearfix">
                             <a href="skype:langmankwong?chat" id = "SkypeButton_Call_langmankwong_1" class="social-icon si-small si-dark si-skype">
                                <i class="icon-skype"></i>
                                <i class="icon-skype"></i>                                
                            </a>                            
                            <a href="mailto:cled@bestcled.com" class="social-icon si-small si-dark si-mail">
                                <i class="icon-mail"></i>
                                <i class="icon-mail"></i>
                            </a>
                         
                        </div>

                        <div class="clear"></div>

                        <i class="icon-envelope2"></i>cled@bestcled.com
                    </div>

				</div>

			</div><!-- #copyrights end -->

		</footer><!-- #footer end -->

</div>
<?php $this->endBody()?>
</body>
</html>
<?php $this->endPage()?>
