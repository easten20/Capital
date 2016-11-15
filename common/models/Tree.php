<?php

namespace common\models;
 
use Yii;
 
class Tree extends \kartik\tree\models\Tree
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }    
    
    /**
     * Override isDisabled method if you need as shown in the  
     * example below. You can override similarly other methods
     * like isActive, isMovable etc.
     */
    public function isDisabled()
    {
        if (Yii::$app->user->identity->username !== 'easten') {
            return true;
        }
        return parent::isDisabled();
    }
}
