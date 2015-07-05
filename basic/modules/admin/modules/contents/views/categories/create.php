<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\modules\admin\modules\contents\models\categories */

$this->title = 'Создать Категорию';
$this->params['breadcrumbs'][] = ['label' => 'Катигории', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categories-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
