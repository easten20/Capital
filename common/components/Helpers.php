<?php
namespace common\components;

use common\models\Category;
use yii\helpers\Url;

class Helpers
{
    public static function categoryTreeBuild() {
    	$parents = Category::find()->where(['lvl' => 0])->all();
    	$categories = Category::find()->where(['lvl' => 1])->all();
    	foreach ($parents as $category) {    			    			
    			self::getCategoriesByParentId($categories, $category);    			
    	}
    }

    private static function getCategoriesByParentId($categories, $parent) {
        if ($parent->lvl == 0)   	                                                                    
            $redirect = Url::to('@web/product/?category=' . $parent->id, true);
        else 
            $redirect = Url::to('@web/product/?subcategory=' . $parent->id, true);
    	echo "<li><a href=\"". $redirect ."\"><div>" . $parent->name . "</div></a>";    	
    	$childs = self::getChildrenArray($categories, $parent->id);
    	if (count($childs) > 0) {
    		echo "<ul>";
    		foreach ($childs as $child) {
    			self::getCategoriesByParentId($categories, $child);
    		}
    		echo "</ul>";
    	}    	
        echo "</li>";
    }    	    

    private static function getChildrenArray($categories, $id) {    	    	
    	$childs = array();
		foreach ($categories as $category) {    		    		
    		if ($category->root == $id && $category->id != $id) {    			
    			array_push($childs, $category);
    		}
    	}    
		return $childs;    	
    }
}