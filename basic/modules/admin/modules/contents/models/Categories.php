<?php

namespace app\modules\admin\modules\contents\models;

use Yii;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "categories".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $is_active
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'description', 'is_active'], 'required', 'message' => 'Данное поле обязательно к заполнению'],
            [['description'], 'string'],
            [['is_active'], 'integer'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'description' => 'Описание',
            'is_active' => 'Активность',
        ];
    }

    /**
     * @inheritdoc
     * @return CategoriesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CategoriesQuery(get_called_class());
    }
	
	public static function getCategorieslList()
	{
		$model = Categories::find()->active()->all();
		
		$result = [];
		foreach($model as $value)
		{
			$result[$value->id] = $value->name;
		}
		
		return $result;
	}
	
	public static function getCategoriesName($id)
	{
		$model = Categories::findOne($id);
		
		return $model->name;
	}
	
	public function getArticles()
	{
		return $this->hasMany(Articles::className(), ['categories__id' => 'id'])->where(['is_active' => 1]);
	}
}
