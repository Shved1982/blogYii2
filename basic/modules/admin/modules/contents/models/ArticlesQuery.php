<?php

namespace app\modules\admin\modules\contents\models;

/**
 * This is the ActiveQuery class for [[Articles]].
 *
 * @see Articles
 */
class ArticlesQuery extends \yii\db\ActiveQuery
{
    public function active()
    {
        $this->andWhere('[[is_active]]=1');
        return $this;
    }
	
	public function byCategories($id)
    {
        $this->andWhere('[[categories__id]]=' . $id);
        return $this;
    }

    /**
     * @inheritdoc
     * @return Articles[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Articles|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}