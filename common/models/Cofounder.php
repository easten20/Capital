<?php

namespace common\models;

use yii\helpers\FileHelper;
use yii\helpers\Url;
use yii\web\UploadedFile;
use Yii;

/**
 * This is the model class for table "cofounder".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $image_1
 */
class Cofounder extends \yii\db\ActiveRecord
{
    public $imageFile1;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cofounder';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description'], 'required'],
            [['id'], 'integer'],
            [['description'], 'string'],
            [['name', 'image_1'], 'string', 'max' => 512]
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
            'description' => 'Description',
            'image_1' => 'Image',
        ];
    }

    public function upload() {
        if ($this->validate()) {            
            $this->imageFile1 = UploadedFile::getInstance($this, 'imageFile1');                            
            
            //check if directory exists
            $dirname = preg_replace('/\s+/', '', strtolower('uploads/cofounder/'));
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
