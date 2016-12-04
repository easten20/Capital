<?php
use frontend\assets\ProductAsset;

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'product', 'url' => ['/product']];
$this->params['breadcrumbs'][] = $model->itemNo;
use yii\helpers\Url;
ProductAsset::register($this);

//seo meta tags
$this->registerMetaTag([
    'name' => 'description',
    'content' => 'Capital - Product ' . $model->category->name . " " . $model->itemNo,
]);
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => $model->itemNo . ', ' .  $model->category->name . ', Lighting, Indonesia, Architectural, Art, Design',
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
													<div class="slide" data-thumb="<?=$model->image_1;?>">
															<a href="<?=$model->image_1;?>"  data-lightbox="gallery-item">
																		<img src="<?=$model->image_1;?>">
															</a>
												    </div>
													<?php if (isset($model->image_2)) {?>
													<div class="slide" data-thumb="<?=$model->image_2;?>">
															<a href="<?=$model->image_2;?>"  data-lightbox="gallery-item">
																		<img src="<?=$model->image_2;?>">
															</a>
												    </div>
												   <?php }?>
												   <?php if (isset($model->image_3)) {?>
													<div class="slide" data-thumb="<?=$model->image_3;?>">
															<a href="<?=$model->image_3;?>"  data-lightbox="gallery-item">
																		<img src="<?=$model->image_3;?>">
															</a>
												    </div>
												   <?php }?>
												   <?php if (isset($model->image_4)) {?>
													<div class="slide" data-thumb="<?=$model->image_4;?>">
															<a href="<?=$model->image_4;?>"  data-lightbox="gallery-item">
																		<img src="<?=$model->image_4;?>">
															</a>
												    </div>
												   <?php }?>
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
									<?php if (empty($model->description)) {?>
												<p>Description is not available</p>

												<p>For more information, please contact us.</p>
									<?php } else {
	echo $model->description;
}?>
									<!-- Product Single - Short Description End -->

									<!-- Product Single - Meta
									============================================= -->
									<div class="panel panel-default product-meta">
										<div class="panel-body">
											<span itemprop="productID" class="sku_wrapper">Name: <span class="sku"><?=$model->itemNo?></span></span>
											<span class="posted_in">Category: <a href="<?=Url::to('@web/product/?category=' . $model->category->id, true);?>" rel="tag"><?=$model->category->name?></a></span>											
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
														<?php if (isset($model->itemNo) && !empty($model->itemNo) ) { ?>
														<tr>
															<td>Item No.</td>
															<td><?=$model->itemNo?></td>
														</tr>
														<?php } ?>
														<?php if (isset($model->voltage) && !empty($model->voltage) ) { ?>
														<tr>
															<td>Input Voltage</td>
															<td><?=$model->voltage?></td>
														</tr>
														<?php } ?>
														<?php if (isset($model->power) && !empty($model->power) ) { ?>
														<tr>
															<td>Power Factor</td>
															<td><?=$model->power?></td>
														</tr>			
														<?php } ?>
														<?php if (isset($model->frequency) && !empty($model->frequency) ) { ?>
														<tr>
															<td>Power Efficiency</td>
															<td><?=$model->efficiency?></td>
														</tr>
														<?php } ?>
														<?php if (isset($model->consumption) && !empty($model->consumption) ) { ?>
														<tr>
															<td>LED Consumptions</td>
															<td><?=$model->consumption?></td>
														</tr>
														<?php } ?>
														<?php if (isset($model->consumption_lamp) && !empty($model->consumption_lamp) ) { ?>
														<tr>
															<td>Lamp Consumptions</td>
															<td><?=$model->consumption_lamp?></td>
														</tr>
														<?php } ?>
														<?php if (isset($model->luminous) && !empty($model->luminous) ) { ?>
														<tr>
															<td>LED Luminous</td>
															<td><?=$model->luminous?></td>
														</tr>
														<?php } ?>
														<?php if (isset($model->luminous_lamp) && !empty($model->luminous_lamp) ) { ?>
														<tr>
															<td>Lamp Luminous</td>
															<td><?=$model->luminous_lamp?></td>
														</tr>
														<?php } ?>
														<?php if (isset($model->cri) && !empty($model->cri) ) { ?>
														<tr>
															<td>CRI</td>
															<td><?=$model->cri?></td>
														</tr>
														<?php } ?>
														<?php if (isset($model->angle) && !empty($model->angle) ) { ?>
														<tr>
															<td>Beam Angle</td>
															<td><?=$model->angle ?></td>
														</tr>
														<?php } ?>
														<?php if (isset($model->cob_light_source) && !empty($model->cob_light_source) ) { ?>
														<tr>
															<td>COB Light Source</td>
															<td><?=$model->cob_light_source ?></td>
														</tr>
														<?php } ?>
														<?php if (isset($model->tj) && !empty($model->tj) ) { ?>
														<tr>
															<td>TJ</td>
															<td><?=$model->tj?></td>
														</tr>
														<?php } ?>
														<?php if (isset($model->protect_grade) && !empty($model->protect_grade) ) { ?>
														<tr>
															<td>Protect Grade</td>
															<td><?=$model->protect_grade?></td>
														</tr>
														<?php } ?>
														<?php if (isset($model->environemnt) && !empty($model->environemnt) ) { ?>
														<tr>
															<td>Working Environment</td>
															<td><?=$model->environemnt?></td>
														</tr>			
														<?php } ?>
														<?php if (isset($model->storage) && !empty($model->storage) ) { ?>
														<tr>
															<td>Storage Temp</td>
															<td><?=$model->storage?></td>
														</tr>
														<?php } ?>
														<?php if (isset($model->lifespan) && !empty($model->lifespan) ) { ?>
														<tr>
															<td>Lifespan</td>
															<td><?=$model->lifespan?></td>
														</tr>
														<?php } ?>
														<?php if (isset($model->material) && !empty($model->material) ) { ?>
														<tr>
															<td>Material</td>
															<td><?=$model->material?></td>
														</tr>
														<?php } ?>
														<?php if (isset($model->dimension) && !empty($model->dimension) ) { ?>
														<tr>
															<td>Dimension</td>
															<td><?=$model->dimension?></td>
														</tr>
														<?php } ?>
														<?php if (isset($model->luminous_lamp) && !empty($model->luminous_lamp) ) { ?>
														<tr>
															<td>Net Weight</td>
															<td><?=$model->weight?></td>
														</tr>
														<?php } ?>
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