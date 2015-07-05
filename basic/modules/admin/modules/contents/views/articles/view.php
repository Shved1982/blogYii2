<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\modules\admin\modules\contents\models\Articles;
use app\modules\admin\modules\contents\models\Categories;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\modules\contents\models\articles */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Статьи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articles-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
		<?= Html::a('К списку статей', ['index', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить эту статью?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [

            [
	            'attribute'=>'categories__id',
	            'value'=> Categories::getCategoriesName($model->categories__id),
	        ],
            'name',
            'date_public:date',
            'short_text:ntext',
            'full_text:ntext',
            [
	            'attribute'=>'is_active',
	            'value'=>$model->is_active ? 'Актиная' : 'Не активная',
	        ],
        ],
    ]) ?>

</div>
