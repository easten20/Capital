<?php

use yii\helpers\Url;
$brands = common\models\BrandType::find()->all();
//print_r($brands); die();
$categories = common\models\Tree::find()->where(['lvl' => 1])->all();
//print_r($categories);die();
?>

<!-- Header ============================================= -->
<?php
/* @var $isTransparent */

if (isset($isTransparent)) {
    ?>
    <header id="header" class="transparent-header dark full-header" data-sticky-class="dark">
    <?php } else { ?>
        <header id="header" class="full-header dark" data-sticky-class="dark">
        <?php } ?>

        <div id="header-wrap">

            <div class="container clearfix">

                <div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

                <!-- Logo
                ============================================= -->
                <div id="logo">
                    <a href="#" class="standard-logo" data-dark-logo="<?= Url::to('@web/images/capital/logo_capital_dark_small.png', true); ?>"><img src="<?= Url::to('@web/images/capital/logo_capital_small.png', true); ?>" alt="Capital Lighting Logo"></a>
                    <a href="'#" class="retina-logo" data-dark-logo="<?= Url::to('@web/images/capital/logo_capital_dark_2X.png', true); ?>"><img src="<?= Url::to('@web/images/capital/logo_capital_small.png', true); ?>" alt="Capital Lighting Logo"></a>
                </div><!-- #logo end -->

                <!-- Primary Navigation
                ============================================= -->
                <nav id="primary-menu">

                    <ul>
                        <li><a href="<?= Url::to('@web/', true); ?>"><div>Home</div></a></li>
                        <li class="current mega-menu"><a href="#"><div>Products</div></a>
                            <div class="mega-menu-content style-2 col-4 clearfix">
                                <ul>
                                </ul>
                                <ul>
                                    <li class="mega-menu-title"><a href="#"><div>Brands</div></a>
                                        <ul>
                                            <?php
                                            if ($brands) :
                                                foreach ($brands as $brand) :
                                                    ?>
                                                    <li><a href="<?= Url::to('@web/brand/' . $brand->brandName, true); ?>"><div><?= $brand->brandName ?></div></a></li>
                                                    <?php
                                                endforeach;
                                            endif;
                                            ?>
                                        </ul>
                                    </li>
                                </ul>
                                <ul>
                                    <li class="mega-menu-title"><a href="#"><div>Categories</div></a>
                                        <ul>
                                            <?php
                                            if ($categories):
                                                foreach ($categories as $category) :
                                                    ?>
                                                    <li><a href="<?= Url::to('@web/product/?ProductSearch[categoryId]=' . $category->id, true); ?>"><div><?= $category->name ?></div></a></li>
                                                    <?php
                                                endforeach;
                                            endif;
                                            ?>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li><a href="<?= Url::to('@web/site/about', true); ?>"><div>About Us</div></a></li>
                        <li><a href="<?= Url::to('@web/site/contact', true); ?>"><div>Contact</div></a></li>
                    </ul>

                    <div id="top-search">
                        <a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
                        <form action="<?= Url::to('@web/product/', true); ?>" method="get">
                            <input type="text" name="ProductSearch[itemNo]" class="form-control" value="" placeholder="Type &amp; Hit Enter..">
                        </form>
                    </div><!-- #top-search end -->
                </nav><!-- #primary-menu end -->

            </div>

        </div>

    </header><!-- #header end -->
