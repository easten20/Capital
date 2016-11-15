<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Portfoliogalery]].
 *
 * @see Portfoliogalery
 */
class PortfoliogaleryQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Portfoliogalery[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Portfoliogalery|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
