<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\modules\contents\models\categories */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Категории', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categories-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
		<?= Html::a('К списку категорий', ['index'], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить эту категорию и все связанные статьи?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'description:ntext',
            [
	            'attribute'=>'is_active',
	            'value'=>$model->is_active ? 'Активная' : 'Не активная',
	        ],
        ],
    ]) ?>

</div>
