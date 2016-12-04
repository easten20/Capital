<?php

error_reporting(-1);
ini_set('display_errors', true);
/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About Us';
$this->params['breadcrumbs'][] = $this->title;


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
<div class="site-about container clearfix">    

    <p>
    	<?= $model->description; ?>
    </p>
</div>
