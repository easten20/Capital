<?php

namespace common\models;

use Yii;
use yii\helpers\FileHelper;
use yii\helpers\Url;
use yii\web\UploadedFile;

/**
 * This is the model class for table "page".
 *
 * @property integer $id
 * @property string $name
 * @property string $title
 * @property string $description
 * @property string $image_1
 */
class Page extends \yii\db\ActiveRecord
{
    /**
     * @UploadedFile
     */    
    public $imageFile1;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'page';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['description'], 'string'],
            [['name', 'title', 'image_1'], 'string', 'max' => 256],
            [['name'], 'unique']
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
            'title' => 'Title',
            'description' => 'Description',
            'image_1' => 'Image 1',
        ];
    }

    /**
     * @inheritdoc
     * @return PageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PageQuery(get_called_class());
    }


    public function upload() {
        if ($this->validate()) {
            $this->imageFile1 = UploadedFile::getInstance($this, 'imageFile1');            
            
            //check if directory exists
            $dirname = preg_replace('/\s+/', '', strtolower('uploads/page/' . $this->name));
            if (!is_dir($dirname)) {
                FileHelper::createDirectory($dirname);
            }                                    
            if (isset($this->imageFile1)) {                        
                $filename = $this->name . '_1.' . $this->imageFile1->extension;
                $imageName = $dirname . '/' . $filename;
                $imageName = preg_replace('/\s+/', '', strtolower($imageName));

                $this->imageFile1->saveas($imageName);
                //$this->imageFile1 = ''; //bug in yii 2.0 need variable flushed after updated -- solution set with an empty variable
                $this->image_1 = Url::base() . '/' . $imageName;
            }                        
            return true;
        } else {

            return false;
        }
    }
}
