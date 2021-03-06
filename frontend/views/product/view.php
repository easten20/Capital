<?php

use frontend\assets\ProductAsset;

$this->title = $model->itemNo;
$this->params['breadcrumbs'][] = ['label' => 'product', 'url' => ['/product']];
$this->params['breadcrumbs'][] = $model->itemNo;

use yii\helpers\Url;

ProductAsset::register($this);

//seo meta tags
$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Capital - Product ' . $model->itemNo,
]);

$this->registerMetaTag([
    'name' => 'keywords',
    'content' => $model->itemNo.' Lighting, Indonesia, Architectural, Art, Design',
]);

$this->registerMetaTag([
    'name' => 'robots',
    'content' => 'index,follow',
]);
?>

<div class="centered">
    <div class="postcontent nobottommargin clearfix">

        <div class="single-product">

            <div class="product">

                <div class="col-md-6">

                    <!-- Product Single - Gallery
                    ============================================= -->
                    <div class="product-image">
                        <div class="fslider" data-pagi="false" data-arrows="false" data-thumbs="true">
                            <div class="flexslider">
                                <div class="slider-wrap" data-lightbox="gallery">
                                    <?php
                                    foreach ($model->productgaleries as $galeryproduct) {
                                        ?>
                                        <div class="slide" data-thumb="<?= $galeryproduct->image; ?>">
                                            <a href="<?= $galeryproduct->image; ?>"  data-lightbox="gallery-item">
                                                <img src="<?= $galeryproduct->image; ?>">
                                            </a>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    
                                    
                                </div>
                            </div>
                        </div>
                    </div><!-- Product Single - Gallery End -->

                </div>

                <div class="col-md-6 col_last product-desc">


                    <div class="clear"></div>
                    <div class="line"></div>

                    <!-- Product Single - Short Description
                    ============================================= -->
                    <?php if (empty($model->description)) { ?>
                        <p>Description is not available</p>

                        <p>For more information, please contact us.</p>
                        <?php
                    } else {
                        echo $model->description;
                    }
                    ?>
                    <!-- Product Single - Short Description End -->

                    <!-- Product Single - Meta
                    ============================================= -->
                    <div class="panel panel-default product-meta">
                        <div class="panel-body">
                            <span itemprop="productID" class="sku_wrapper">Name: <span class="sku"><?= $model->itemNo ?></span></span>
                            
                            <span class="posted_in">Brand: <a href="<?= Url::to('@web/brand/' . $model->brandType->brandName, true); ?>" rel="tag"><?= $model->brandType->brandName ?></a></span>
                        </div>
                    </div><!-- Product Single - Meta End -->

                    <!-- Product Single - Share
                    ============================================= -->
                    <div class="si-share noborder clearfix">
                        <span>Share:</span>
                        <div>
                            <a href="#" class="social-icon si-borderless si-facebook">
                                <i class="icon-facebook"></i>
                                <i class="icon-facebook"></i>
                            </a>
                            <a href="#" class="social-icon si-borderless si-twitter">
                                <i class="icon-twitter"></i>
                                <i class="icon-twitter"></i>
                            </a>
                            <a href="#" class="social-icon si-borderless si-pinterest">
                                <i class="icon-pinterest"></i>
                                <i class="icon-pinterest"></i>
                            </a>
                        </div>
                    </div><!-- Product Single - Share End -->

                </div>

                <div class="col_full nobottommargin">

                    <div class="tabs clearfix nobottommargin" id="tab-1">

                        <ul class="tab-nav clearfix">
                                <!--<li><a href="#tabs-1"><i class="icon-align-justify2"></i><span class="hidden-xs"> Description</span></a></li> -->
                            <li><a href="#tabs-2"><i class="icon-info-sign"></i><span class="hidden-xs"> Additional Information</span></a></li>
                        </ul>

                        <div class="tab-container">

                            <!-- <div class="tab-content clearfix" id="tabs-1">
                                    <p>Pink printed dress,  woven, round neck with a keyhole and buttoned closure at the back, sleeveless, concealed zip up at left side seam, belt loops along waist with slight gathers beneath, brand appliqu?? above left front hem, has an attached lining.</p>
                                    Comes with a white, slim synthetic belt that has a tang clasp.
                            </div> -->
                            <div class="tab-content clearfix" id="tabs-2">

                                <table class="table table-striped table-bordered">
                                    <tbody>
                                        <tr>
                                            <td>Power</td>
                                            <td><?= $model->power ?></td>
                                        </tr>
                                        <tr>
                                            <td>Luminous</td>
                                            <td><?= $model->luminous ?></td>
                                        </tr>
                                        <tr>
                                            <td>CRI</td>
                                            <td><?= $model->cri ?></td>
                                        </tr>
                                        <tr>
                                            <td>Pfc</td>
                                            <td><?= $model->pfc ?></td>
                                        </tr>
                                        <tr>
                                            <td>Cutout</td>
                                            <td><?= $model->cutout ?></td>
                                        </tr>
                                        <tr>
                                            <td>Angle</td>
                                            <td><?= $model->angle ?></td>
                                        </tr>
                                        <tr>
                                            <td>LED Chip</td>
                                            <td><?= $model->ledChip ?></td>
                                        </tr>
                                        <tr>
                                            <td>Dimension</td>
                                            <td><?= $model->dimension ?></td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>


                        </div>

                    </div>

                </div>

            </div>

        </div>


    </div>

</div>