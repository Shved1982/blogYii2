<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Menu;
?>
<?
	$list = array();
	foreach($categories as $categorie)
	{
		$list[] = ['label' => $categorie->name, 'url' => '/blog/default/view?id=' . $categorie->id];
	}
?>

<div class="span3 bs-docs-sidebar">
	
<?php
echo Menu::widget([
    'items' => $list,
	'options' => [
					'class' => 'nav nav-list bs-docs-sidenav affix',
					
				],
]);
?>

</div>


