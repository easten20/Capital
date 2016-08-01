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
    'content' => 'Capital - Specialist in Architectural Lighting ',
]);

$this->registerMetaTag([
    'name' => 'keywords',
    'content' => 'Lighting, Downlight, Indonesia, Architectural, Design',
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
