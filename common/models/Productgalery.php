<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "productgalery".
 *
 * @property integer $id
 * @property integer $productId
 * @property string $image
 * @property string $information
 *
 * @property Product $product
 */
class Productgalery extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'productgalery';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['productId'], 'integer'],
            [['image', 'information'], 'string', 'max' => 255],
            [['productId'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['productId' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'productId' => 'Product ID',
            'image' => 'Image',
            'information' => 'Information',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'productId']);
    }

    /**
     * @inheritdoc
     * @return ProductgaleryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProductgaleryQuery(get_called_class());
    }
}
