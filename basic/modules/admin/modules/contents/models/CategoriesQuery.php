<?php

namespace app\modules\admin\modules\contents\models;

/**
 * This is the ActiveQuery class for [[Categories]].
 *
 * @see Categories
 */
class CategoriesQuery extends \yii\db\ActiveQuery
{
    public function active()
    {
        $this->andWhere('[[is_active]]=1');
        return $this;
    }

    /**
     * @inheritdoc
     * @return Categories[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Categories|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}