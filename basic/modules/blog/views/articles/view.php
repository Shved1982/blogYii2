<?php
use yii\helpers\Html;
use app\modules\admin\modules\contents\models\Categories;
use app\modules\admin\modules\contents\models\Articles;

/* @var $this yii\web\View */
$this->title = 'Yii2 Blog with Google API';
?>

<div class="blog-default-index col-lg-10">
	<h2><?=Html::encode($article->name)?></h2>
	<div><?=date("d/m/Y", strtotime($article->date_public))?></div>
	<hr>
	<div style="font-weight: bold;">
		<?=Html::encode($article->short_text)?>
	</div>
	<div>
		<?=Html::encode($article->full_text)?>
	</div>
	<hr>
	<a href="#" onClick="history.back()">Назад</a>
</div>
