<?php

namespace app\modules\admin\modules\contents\models;

use Yii;

/**
 * This is the model class for table "articles".
 *
 * @property integer $id
 * @property integer $categories__id
 * @property string $name
 * @property string $date_public
 * @property string $short_text
 * @property string $full_text
 * @property integer $is_active
 */
class Articles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'articles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['categories__id', 'name', 'date_public', 'short_text', 'full_text', 'is_active'], 'required', 'message' => 'Это поле не может быть пустым'],
            [['categories__id', 'is_active'], 'integer'],
            [['date_public'], 'safe'],
            [['short_text', 'full_text'], 'string'],
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
            'categories__id' => 'Категория',
            'name' => 'Заголовок',
            'date_public' => 'Дата публикации',
            'short_text' => 'Вводный текст',
            'full_text' => 'Полный текст',
            'is_active' => 'Активность',
        ];
    }

    /**
     * @inheritdoc
     * @return ArticlesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ArticlesQuery(get_called_class());
    }
}
