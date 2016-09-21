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
class IndexAsset extends AssetBundle {
	public $basePath = '@webroot';
	public $baseUrl = '@web';

	public $css = [
	];
	public $js = [
		'js/slider.js',
		'js/index.js',
		'js/functions.js',
	];
	public $depends = [
	];

}
