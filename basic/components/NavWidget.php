<?php
namespace app\components;
use app\modules\admin\modules\contents\models\Categories;
use app\modules\admin\modules\contents\models\Articles;

use yii\base\Widget;
use yii\helpers\Html;

/**
 * Виджет выовда меню навигации по разделам блога
 *
 * The followings are the available columns in table 'purchases':
 * @param array $categories массив экземпяров класса Categories
 */
class NavWidget extends Widget{

	/**
	* @var array $categories массив экземпяров класса Categories
	*/
    public $categories;
	
	public function init(){
		parent::init();
		$this->categories = Categories::find()->active()->all();
	}
	
	/**
	* Метод генерации меню навигации блога
	*/
	public function run(){
		return $this->render('index', [
			'categories' => $this->categories,
        ]);
	}
}
?>
