<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\modules\contents\models\categories */

$this->title = 'Редактировать Категорию: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Категория', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Сохранить';
?>
<div class="categories-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
