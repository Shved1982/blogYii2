<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\modules\admin\modules\contents\models\Articles;
use app\modules\admin\modules\contents\models\Categories;


/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Статьи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articles-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать статью', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
			
            'name',
			[
	            'attribute'=>'categories__id',
	            'value'=> function ($dataProvider, $key, $index, $column){
					return Categories::getCategoriesName($dataProvider->categories__id);
				},
	        ],  
            'date_public:date',
            'short_text:ntext',
			 [
	            'attribute'=>'is_active',
	            'value'=> function ($dataProvider, $key, $index, $column){
					return $dataProvider->is_active == '1' ? 'Активная' : 'Не активная';
				},
	        ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
