<?php
namespace common\components;

use common\models\Category;

class Helpers
{
    public static function categoryTreeBuild() {
    	$parents = Category::find()->where(['parentId' => null])->all();
    	$categories = Category::find()->all();
    	foreach ($parents as $category) {    			    			
    			self::getCategoriesByParentId($categories, $category);    			
    	}
    }

    private static function getCategoriesByParentId($categories, $parent) {    	
    	echo "<li>" . $parent->name . "</li>";    	
    	$childs = self::getChildrenArray($categories, $parent->id);
    	if (count($childs) > 0) {
    		echo "<ul>";
    		foreach ($childs as $child) {
    			self::getCategoriesByParentId($categories, $child);
    		}
    		echo "</ul>";
    	}    	
    }    	    

    private static function getChildrenArray($categories, $id) {    	    	
    	$childs = array();
		foreach ($categories as $category) {    		    		
    		if ($category->parentId == $id) {    			
    			array_push($childs, $category);
    		}
    	}    
		return $childs;    	
    }
}