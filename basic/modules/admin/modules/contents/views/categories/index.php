<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категории';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categories-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать категорию', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'description:ntext',
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
