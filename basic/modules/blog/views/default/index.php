<?php
use yii\helpers\Html;
use app\modules\admin\modules\contents\models\Categories;
use app\modules\admin\modules\contents\models\Articles;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
$this->title = 'Yii2 Blog with Google API';
?>

<div class="blog-default-index col-lg-10">
<h2>Список категорий:</h2>
    <?foreach($categories as $categorie):?>
		<p><?= Html::a(Html::encode($categorie->name), ['view', 'id' => $categorie->id]) ?></p>
		
	<?endforeach;?>
	
	<?php
		echo LinkPager::widget([
			'pagination' => $pages,
		]);
	?>
	
</div>
