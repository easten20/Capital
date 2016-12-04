<?php

namespace common\models;

use Yii;
use yii\helpers\FileHelper;
use yii\helpers\Url;
use yii\web\UploadedFile;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property integer $brandTypeId
 * @property integer $categoryId
 * @property string $itemNo
 * @property string $power
 * @property string $luminous
 * @property integer $cri
 * @property string $pfc
 * @property string $cutout
 * @property string $angle
 * @property string $width
 * @property string $length
 * @property string $image_1
 * @property string $image_2
 * @property string $image_3
 * @property string $image_4
 * @property string $image_5
 *
 * @property Category $category
 * @property BrandType $brandType
 */
class Product extends \yii\db\ActiveRecord {
	/**
	 * @UploadedFile
	 */
	public $imageFile1;

	public $imageFile2;
	public $imageFile3;
	public $imageFile4;
	public $imageFile5;

	/**
	 * @inheritdoc
	 */
	public static function tableName() {
		return 'product';
	}

	/**
	 * @inheritdoc
	 */
	public function rules() {
		return [
			[[ 'categoryId', 'itemNo', 'name'], 'required'],
			[['categoryId'], 'integer'],
			[['pfc'], 'string', 'max' => 50],
			[['power'], 'string', 'max' => 50],
			[['voltage'], 'string', 'max' => 50],
			[['cri'], 'string', 'max' => 50],
			[['cutout'], 'string', 'max' => 50],
			[['itemNo'], 'string', 'max' => 50],
			[['dimension'], 'string', 'max' => 50],
			[['luminous'], 'string', 'max' => 100],
			[['angle'], 'string', 'max' => 50],			
			[['description'], 'string'],
			[['frequency'], 'string', 'max' => 512],
			[['efficiency'], 'string', 'max' => 255],
			[['consumption'], 'string', 'max' => 255],
			[['consumption_lamp'], 'string', 'max' => 255],
			[['luminous_lamp'], 'string', 'max' => 255],
			[['cob_light_source'], 'string', 'max' => 255],
			[['tj'], 'string', 'max' => 255],
			[['protect_grade'], 'string', 'max' => 255],
			[['environment'], 'string', 'max' => 255],
			[['storage'], 'string', 'max' => 255],
			[['lifespan'], 'string', 'max' => 255],
			[['material'], 'string', 'max' => 255],			
			[['weight'], 'integer'],
			[['itemNo'], 'unique'],
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels() {
		return [
			'id' => 'ID',			
			'categoryId' => 'Category ID',
			'itemNo' => 'Item No',
			'power' => 'Power',
			'luminous' => 'LED Luminous',
			'cri' => 'Cri',
			'pfc' => 'Pfc',
			'cutout' => 'Cutout',
			'angle' => 'Beam Angle',			
			'dimension' => 'Dimension',
			'description' => 'Description',
			'name' => 'Name',
			'frequency' => 'Frequency',		
			'voltage' => 'Input Voltage',
			'efficiency' => 'Power Efficiency',
			'consumption_lamp' => 'Lamp Consumption',
			'consumption' => 'LED Consumption',
			'luminous_lamp' => 'Lamp Luminous',
			'cob_light_source' => 'COB Light Source',			
			'tj' => 'TJ',
			'protect_grade' => 'Protect Grade',
			'environment' => 'Working Environment',
			'storage' => 'Storage Temp.',
			'lifespan' => 'Lifespan',
			'dimension' => 'Dimension (cm)',
			'weight' => 'Net Weight',
		];
	}

	/**
	 * @return \yii\db\ActiveQuery
	 */
	public function getCategory() {
		return $this->hasOne(Category::className(), ['id' => 'categoryId']);
	}

	/**
	 * @inheritdoc
	 * @return ProductQuery the active query used by this AR class.
	 */
	public static function find() {
		return new ProductQuery(get_called_class());
	}

	public function upload() {
		if ($this->validate()) {
			$this->imageFile1 = UploadedFile::getInstance($this, 'imageFile1');
			$this->imageFile2 = UploadedFile::getInstance($this, 'imageFile2');
			$this->imageFile3 = UploadedFile::getInstance($this, 'imageFile3');
			$this->imageFile4 = UploadedFile::getInstance($this, 'imageFile4');
			$this->imageFile5 = UploadedFile::getInstance($this, 'imageFile5');

			//check if directory exists
			$dirname = preg_replace('/\s+/', '', strtolower('uploads/product/' . $this->itemNo));
			if (!is_dir($dirname)) {
				FileHelper::createDirectory($dirname);
			}

			if (isset($this->imageFile1)) {
				$filename = $this->itemNo . '_1.' . $this->imageFile1->extension;
				$imageName = $dirname . '/' . $filename;
				$imageName = preg_replace('/\s+/', '', strtolower($imageName));

				$this->imageFile1->saveAs($imageName);
				$this->imageFile1 = ''; //bug in yii 2.0 need variable flushed after updated -- solution set with an empty variable
				$this->image_1 = Url::base() . '/' . $imageName;
			}
			if (isset($this->imageFile2)) {
				$filename = $this->itemNo . '_2.' . $this->imageFile2->extension;
				$imageName = $dirname . '/' . $filename;
				$imageName = preg_replace('/\s+/', '', strtolower($imageName));

				$this->imageFile2->saveAs($imageName);
				$this->imageFile2 = ''; //bug in yii 2.0 need variable flushed after updated -- solution set with an empty variable
				$this->image_2 = Url::base() . '/' . $imageName;
			}
			if (isset($this->imageFile3)) {
				$filename = $this->itemNo . '_3.' . $this->imageFile3->extension;
				$imageName = $dirname . '/' . $filename;
				$imageName = preg_replace('/\s+/', '', strtolower($imageName));

				$this->imageFile3->saveAs($imageName);
				$this->imageFile3 = ''; //bug in yii 2.0 need variable flushed after updated -- solution set with an empty variable
				$this->image_3 = Url::base() . '/' . $imageName;
			}
			if (isset($this->imageFile4)) {
				$filename = $this->itemNo . '_4.' . $this->imageFile4->extension;
				$imageName = $dirname . '/' . $filename;
				$imageName = preg_replace('/\s+/', '', strtolower($imageName));

				$this->imageFile4->saveAs($imageName);
				$this->imageFile4 = ''; //bug in yii 2.0 need variable flushed after updated -- solution set with an empty variable
				$this->image_4 = Url::base() . '/' . $imageName;
			}
			if (isset($this->imageFile5)) {
				$filename = $this->itemNo . '_5.' . $this->imageFile5->extension;
				$imageName = $dirname . '/' . $filename;
				$imageName = preg_replace('/\s+/', '', strtolower($imageName));

				$this->imageFile5->saveAs($imageName);
				$this->imageFile5 = ''; //bug in yii 2.0 need variable flushed after updated -- solution set with an empty variable
				$this->image_5 = Url::base() . '/' . $imageName;
			}
			return true;
		} else {

			return false;
		}
	}
}
