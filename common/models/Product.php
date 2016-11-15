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
 * @property string $ledChip
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
            [['brandTypeId', 'itemNo'], 'required'],
            [['brandTypeId'], 'integer'],
            [['pfc'], 'string', 'max' => 50],
            [['power'], 'string', 'max' => 50],
            [['cri'], 'string', 'max' => 50],
            [['cutout'], 'string', 'max' => 50],
            [['itemNo'], 'string', 'max' => 50],
            [['dimension'], 'string', 'max' => 50],
            [['luminous'], 'string', 'max' => 100],
            [['angle'], 'string', 'max' => 50],
            [['ledChip'], 'string', 'max' => 50],
            [['description'], 'string'],
            [['itemNo'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'brandTypeId' => 'Brand Type ID',
            'itemNo' => 'Item No',
            'power' => 'Power',
            'luminous' => 'Luminous',
            'cri' => 'Cri',
            'pfc' => 'Pfc',
            'cutout' => 'Cutout',
            'angle' => 'Angle',
            'ledChip' => 'Led Chip',
            'dimension' => 'Dimension',
            'description' => 'Description',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductcategories() {
        return $this->hasMany(Categoryproduct::className(), ['productId' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBrandType() {
        return $this->hasOne(BrandType::className(), ['id' => 'brandTypeId']);
    }

    public function getProductgaleries() {
        return $this->hasMany(Productgalery::className(), ['productId' => 'id']);
    }

    /**
     * @inheritdoc
     * @return ProductQuery the active query used by this AR class.
     */
    public static function find() {
        return new ProductQuery(get_called_class());
    }

}
