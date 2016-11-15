<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "portfoliogalery".
 *
 * @property integer $id
 * @property integer $portfolioId
 * @property string $image
 * @property string $information
 *
 * @property Portfolio $portfolio
 */
class Portfoliogalery extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'portfoliogalery';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['portfolioId'], 'integer'],
            [['image', 'information'], 'string', 'max' => 255],
            [['portfolioId'], 'exist', 'skipOnError' => true, 'targetClass' => Portfolio::className(), 'targetAttribute' => ['portfolioId' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'portfolioId' => 'Portfolio ID',
            'image' => 'Image',
            'information' => 'Information',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPortfolio()
    {
        return $this->hasOne(Portfolio::className(), ['id' => 'portfolioId']);
    }

    /**
     * @inheritdoc
     * @return PortfoliogaleryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PortfoliogaleryQuery(get_called_class());
    }
}
