<?php
namespace app\components;
use app\modules\admin\modules\contents\models\Categories;
use app\modules\admin\modules\contents\models\Articles;

use yii\base\Widget;
use yii\helpers\Html;

class NavWidget extends Widget{
	public $categories;
	
	public function init(){
		parent::init();
		$this->categories = Categories::find()->active()->all();
	}
	
	public function run(){
		return $this->render('index', [
			'categories' => $this->categories,
        ]);
	}
}
?>
