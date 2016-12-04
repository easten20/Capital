<?php

/* @var $this yii\web\View */
use yii\helpers\Url;
use common\models\Page;
use common\models\Cofounder;

$this->title = 'Dongguan CLED Optoelectronic Technology Co., Ltd - LED street light, LED tunnel light, LED outdoor light, LED indoor light';

//seo meta tags
$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Dongguan CLED Optoelectronic Technology Co., Ltd - LED street light, LED tunnel light, LED outdoor light, LED indoor light ',
]);

$this->registerMetaTag([
    'name' => 'keywords',
    'content' => 'LED street light, LED tunnel light, LED outdoor light, LED indoor light',
]);

$this->registerMetaTag([
    'name' => 'robots',
    'content' => 'index,follow',
]);
?>
<div class="container clearfix"> 
    <div class="row clearfix">
        <div class="col-lg-5">
            <div class="heading-block topmargin">          
                <h1>
                    <?php $home_1 = Page::findOne(['name' => 'home_1']); 
                        echo $home_1->title;
                    ?>                    
                </h1>
            </div>
            <p class="lead">
                <?= $home_1->description; ?>  
            </p>
        </div>
        <div class="col-lg-7">
            <div class="ohidden" data-height-lg="426" data-height-md="567" data-height-sm="470" data-height-xs="287" data-height-xxs="183" style="position: relative; margin-bottom: -60px;">
                <img alt="Lighting" data-animate="fadeInUp" data-delay="100" src="<?= Url::to($home_1->image_1, true); ?>" style="position: absolute; top: 0; left: 0; height: 100%;">
                </img>
            </div>
        </div>
    </div>
</div>
<div class="section nobottommargin nobottomborder">
    <div class="container clearfix">
        <div class="heading-block center nomargin">
            <h3>
                Our Latest Works
            </h3>
        </div>
    </div>
</div>
<div class="portfolio-nomargin portfolio-notitle portfolio-full clearfix" id="portfolio">
    <?php foreach($portfolio->getModels() as $item) { ?>

    <article class="portfolio-item pf-media pf-icons">
        <div class="portfolio-image">
            <a href="#">                
                <img alt="Open Imagination" src="<?= Url::to($item->thumbnail, true); ?>">
                </img>
            </a>
            <div class="portfolio-overlay" data-lightbox="gallery">
                <?php if (!empty($item->image_1)) { ?>
                <a class="center-icon" data-lightbox="gallery-item" href="<?= Url::to($item->image_1, true); ?>">
                    <i class="icon-line-plus">
                    </i>
                </a>
                <?php } ?>
                <?php if (!empty($item->image_2)) { ?>
                <a class="center-icon" data-lightbox="gallery-item" href="<?= Url::to($item->image_2, true); ?>">
                    <i class="icon-line-plus">
                    </i>
                </a>
                <?php } ?>
                <?php if (!empty($item->image_3)) { ?>
                <a class="center-icon" data-lightbox="gallery-item" href="<?= Url::to($item->image_3, true); ?>">
                    <i class="icon-line-plus">
                    </i>
                </a>
                <?php } ?>
            </div>
        </div>
        <div class="portfolio-desc">
            <h3>
                <a href="portfolio-single.html">
                     <?= $item->name ?>
                </a>
            </h3>
            <span>
                <a href="#">
                     <?= $item->location ?>
                </a>
            </span>
        </div>
    </article>   
    <?php } ?>
</div>
<div class="clear">
</div>
<a class="button button-full button-dark center tright bottommargin-lg" href="#">
    <div class="container clearfix">
        Specialized lighting design for fine architectures
    </div>
</a>
<?php $home_2 = Page::findOne(['name' => 'home_2']); ?>
<div class="container clearfix">
    <div class="col_one_third bottommargin-sm center">
        <img alt="lamp" data-animate="fadeInLeft" src="<?= Url::to($home_2->image_1, true); ?>">
        </img>
    </div>
    <div class="col_two_third bottommargin-sm col_last">
        <div class="heading-block topmargin-sm">
            <h3>                   
                    <?= $home_2->title; ?>  
            </h3>
        </div>
        <p>
            <?= $home_2->description; ?>  
        </p>        
    </div>
</div>
<div class="section parallax dark nobottommargin" data-stellar-background-ratio="0.4" style="background-image: url('images/capital/background.jpg'); padding: 100px 0;">
    <div class="heading-block center">
        <h3>
Inspirational Quotes
        </h3>
    </div>
    <div class="fslider testimonial testimonial-full" data-animation="fade" data-arrows="false">
        <div class="flexslider">
            <div class="slider-wrap">
                <div class="slide">
                    <div class="testi-image">
                        <a href="#">
                           <!-- <img alt="Customer Testimonails" src="images/testimonials/1.jpg"/> -->
                        </a> 
                    </div>
                    <div class="testi-content">
                        <p>
				Perfection is not attainable, but if we chase perfection we can catch excellence.
                        </p>
                        <div class="testi-meta">
		                    Vince Lombardi
				<!--<span>
                                Apple Inc.
                            </span>-->
                        </div>
                    </div>
                </div>
                <div class="slide">
                    <div class="testi-image">
                           <!-- <img alt="Customer Testimonails" src="images/testimonials/1.jpg"/> -->
                    </div>
                    <div class="testi-content">
                        <p>
                            Less is more. <br > Texture is essential as well as scale.
                        </p>
                        <div class="testi-meta">
                            Trip Haenisch
				<!--<span>
                                Apple Inc.
                            </span>-->
                        </div>
                    </div>
                </div>
                <div class="slide">
                    <div class="testi-image">
                           <!-- <img alt="Customer Testimonails" src="images/testimonials/1.jpg"/> -->
                    </div>
                    <div class="testi-content">
                        <p>
                            Color is like food for the spirit... plus it's not addictive or fattening
                        </p>
                        <div class="testi-meta">
                            Isaac Mizrahi
				<!--<span>
                                Apple Inc.
                            </span>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--<div class="section">
    <div class="container clearfix">
        <div class="row topmargin-sm">
            <div class="heading-block center">
                <h3>
                    Meet Our Team
                </h3>
            </div>
            <div class="row centered">               
                <?php $counter = 0; ?>
                <?php foreach($cofounders as $cofounder) { ?> 
                <?php $counter += 1; ?>
                <div class="col-md-3 col-sm-6 bottommargin">
                    <div class="team">
                        <div class="team-image">
                            <a href="#myModal<?= $counter ?>" data-lightbox="inline">
                            <img alt="<?= $cofounder->name ?>" src="<?= Url::to($cofounder->image_1, true); ?>">
                            </img>
                            </a>                            
                        </div>
                        <div class="team-desc team-desc-bg">
                            <div class="team-title">
                                <h4>
                                    <?= $cofounder->name ?>
                                </h4>
                                <span>
Founder
                                </span>
                            </div>
                           <!-- <a class="social-icon inline-block si-small si-light si-rounded si-facebook" href="#">
                                <i class="icon-facebook">
                                </i>
                                <i class="icon-facebook">
                                </i>
                            </a>
                            <a class="social-icon inline-block si-small si-light si-rounded si-twitter" href="#">
                                <i class="icon-twitter">
                                </i>
                                <i class="icon-twitter">
                                </i>
                            </a>
                            <a class="social-icon inline-block si-small si-light si-rounded si-gplus" href="#">
                                <i class="icon-gplus">
                                </i>
                                <i class="icon-gplus">
                                </i>
                            </a>-->
                        <!--</div>
                    </div>
                </div> -->
                <!-- Modal -->
<!--<div class="modal1 mfp-hide" id="myModal<?= $counter ?>">
    <div class="block divcenter" style="background-color: #FFF; max-width: 500px;">
        <div class="center" style="padding: 50px;">
            <h3><?= $cofounder->name ?></h3>
            <p class="nobottommargin">
                <?= $cofounder->description ?>
            </p>
        </div>
        <div class="section center nomargin" style="padding: 30px;">
            <a href="#" class="button" onClick="$.magnificPopup.close();return false;">Close</a>
        </div>
    </div>
</div> 
                <?php } ?>                
            </div>
        </div>
    </div>
</div>--> 
<div class="topmargin">
<div class="container">
    <div class="owl-carousel image-carousel" id="oc-clients">        
         <div class="oc-item">
            <a href="#">              
            </a>
        </div>
        <div class="oc-item">
            <a href="#">
                <img alt="Clients" src="images/capital/client_logo/ce.png"/>
            </a>
        </div>
        <div class="oc-item">
            <a href="#">
                <img alt="Clients" src="images/capital/client_logo/environmental.png"/>
            </a>
        </div>
        <div class="oc-item">
            <a href="#">
                <img alt="Clients" src="images/capital/client_logo/iso.png"/>
            </a>
        </div>
        <div class="oc-item">
            <a href="#">
                <img alt="Clients" src="images/capital/client_logo/waltek.png"/>
            </a>
        </div>
    </div>
</div>
</div>