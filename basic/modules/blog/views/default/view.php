<?php
use yii\helpers\Html;
use app\modules\admin\modules\contents\models\Categories;
use app\modules\admin\modules\contents\models\Articles;
use yii\widgets\LinkPager;

/* @var $this yii\web\View */
$this->title = 'Yii2 Blog with Google API';
?>

<div class="blog-default-index col-lg-10">
	<h2><?=Html::encode($categorie->name)?></h2>
	<div><?=Html::encode($categorie->description)?></div>
	<hr>
	<?if(count($categorie->articles) > (int)FALSE):?>
		<div class="row">
			<div class="col-lg-12">
				<h3>Список статей по данной категории</h3>
				<ul>
					<?foreach($categorie->articles as $value):?>
						<li style="margin-top: 15px;">
							<?= Html::a(Html::encode($value->name), ['/blog/articles/view', 'id' => $categorie->id]) ?>
							<div><?=Html::encode($value->short_text)?></div>
						</li>
					<?endforeach;?>
					<?php
						echo LinkPager::widget([
							'pagination' => $pages,
						]);
					?>
				</ul>
			</div>
		</div>
	<?else:?>
		<h5>В данной категории нет статей.</h5>
	<?endif;?>
</div>
