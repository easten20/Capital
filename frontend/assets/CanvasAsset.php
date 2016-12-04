<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * @author Timur Pratama W <timur.wiradarma@outlook.com>
 * @since 2.0
 */
class CanvasAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    
    public $css = [
        'css/style.css',
        'css/canvas/dark.css',
        'css/canvas/font-icons.css',
        'css/canvas/animate.css',
        'css/canvas/magnific-popup.css',
        'css/canvas/responsive.css',
        'css/canvas/color.css'
    ];
    public $js = [    
        'js/jquery.js',
        'js/plugins.js',                              
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',        
    ];
    
    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];
}
