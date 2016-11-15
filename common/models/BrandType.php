<?php

namespace common\models;

use yii\helpers\FileHelper;
use yii\helpers\Url;
use yii\web\UploadedFile;
use Yii;

/**
 * This is the model class for table "brandType".
 *
 * @property integer $id
 * @property string $brandName
 * @property string $description
 * @property string $image_1
 *
 * @property Product[] $products
 */
class BrandType extends \yii\db\ActiveRecord
{
    public $logoFile;
    public $imageFile1;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'brandType';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['brandName'], 'required'],
            [['description'], 'string'],
            [['brandName'], 'string', 'max' => 255],
            [['logo', 'image_1'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'brandName' => 'Brand Name',
            'description' => 'Description',
            'logo' => 'Logo',
            'image_1' => 'Image',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['brandTypeId' => 'id']);
    }

     public function upload() {
        if ($this->validate()) {
            $this->imageFile1 = UploadedFile::getInstance($this, 'imageFile1');            
            $this->logoFile = UploadedFile::getInstance($this, 'logoFile');            
            
            //check if directory exists
            $dirname = preg_replace('/\s+/', '', strtolower('uploads/brand/' . $this->brandName));
            if (!is_dir($dirname)) {
                FileHelper::createDirectory($dirname);
            }                                    
            if (isset($this->imageFile1)) {                        
                $filename = $this->brandName . '_1.' . $this->imageFile1->extension;
                $imageName = $dirname . '/' . $filename;
                $imageName = preg_replace('/\s+/', '', strtolower($imageName));

                $this->imageFile1->saveas($imageName);
                //$this->imageFile1 = ''; //bug in yii 2.0 need variable flushed after updated -- solution set with an empty variable
                $this->image_1 = Url::base() . '/' . $imageName;
            }                        
            if (isset($this->logoFile)) {                        
                $filename = $this->brandName . '_1.' . $this->logoFile->extension;
                $imageName = $dirname . '/' . $filename;
                $imageName = preg_replace('/\s+/', '', strtolower($imageName));

                $this->logoFile->saveas($imageName);
                //$this->imageFile1 = ''; //bug in yii 2.0 need variable flushed after updated -- solution set with an empty variable
                $this->logo = Url::base() . '/' . $imageName;
            }         
            return true;
        } else {

            return false;
        }
    }
}
