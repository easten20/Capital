<?php

namespace common\models;

use Yii;
use yii\helpers\FileHelper;
use yii\helpers\Url;
use yii\web\UploadedFile;

/**
 * This is the model class for table "portfolio".
 *
 * @property integer $id
 * @property string $name
 * @property string $location
 * @property string $thumbnail
 * @property string $image_1
 * @property string $image_2
 * @property string $image_3
 */
class Portfolio extends \yii\db\ActiveRecord
{
    /**
     * @UploadedFile
     */
    public $thumbnailFile;
   
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'portfolio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'location'], 'required'],
            [['name', 'location'], 'string', 'max' => 256],        
            [['thumbnail'], 'string', 'max' => 512]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'location' => 'Location',
            'thumbnail' => 'Thumbnail',
         
        ];
    }

    /**
     * @inheritdoc
     * @return PortfolioQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PortfolioQuery(get_called_class());
    }
    
    public function getPortfoliogaleries()
    {
        return $this->hasMany(Portfoliogalery::className(), ['portfolioId' => 'id']);
    }


    public function upload() {
        if ($this->validate()) {
            $this->imageFile1 = UploadedFile::getInstance($this, 'imageFile1');
            $this->imageFile2 = UploadedFile::getInstance($this, 'imageFile2');
            $this->imageFile3 = UploadedFile::getInstance($this, 'imageFile3');
            $this->thumbnailFile = UploadedFile::getInstance($this, 'thumbnailFile');                                    
            
            //check if directory exists
            $dirname = preg_replace('/\s+/', '', strtolower('uploads/portfolio/' . $this->name));
            if (!is_dir($dirname)) {
                FileHelper::createDirectory($dirname);
            }                                    
            if (isset($this->imageFile1)) {                        
                $filename = $this->name . '_1.' . $this->imageFile1->extension;
                $imageName = $dirname . '/' . $filename;
                $imageName = preg_replace('/\s+/', '', strtolower($imageName));

                $this->imageFile1->saveAs($imageName);
                $this->imageFile1 = ''; //bug in yii 2.0 need variable flushed after updated -- solution set with an empty variable
                $this->image_1 = Url::base() . '/' . $imageName;
            }
            if (isset($this->imageFile2)) {
                $filename = $this->name . '_2.' . $this->imageFile2->extension;
                $imageName = $dirname . '/' . $filename;
                $imageName = preg_replace('/\s+/', '', strtolower($imageName));

                $this->imageFile2->saveAs($imageName);
                $this->imageFile2 = ''; //bug in yii 2.0 need variable flushed after updated -- solution set with an empty variable
                $this->image_2 = Url::base() . '/' . $imageName;
            }
            if (isset($this->imageFile3)) {
                $filename = $this->name . '_3.' . $this->imageFile3->extension;
                $imageName = $dirname . '/' . $filename;
                $imageName = preg_replace('/\s+/', '', strtolower($imageName));

                $this->imageFile3->saveAs($imageName);
                $this->imageFile3 = ''; //bug in yii 2.0 need variable flushed after updated -- solution set with an empty variable
                $this->image_3 = Url::base() . '/' . $imageName;
            }
            if (isset($this->thumbnailFile)) {
                $filename = $this->name . '_thumbnail.' . $this->thumbnailFile->extension;
                $imageName = $dirname . '/' . $filename;
                $imageName = preg_replace('/\s+/', '', strtolower($imageName));

                $this->thumbnailFile->saveAs($imageName);
                $this->thumbnailFile = ''; //bug in yii 2.0 need variable flushed after updated -- solution set with an empty variable
                $this->thumbnail = Url::base() . '/' . $imageName;
            }                           
            return true;
        } else {

            return false;
        }
    }
}
