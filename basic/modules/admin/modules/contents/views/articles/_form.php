<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\admin\modules\contents\models\Articles;
use app\modules\admin\modules\contents\models\Categories;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\modules\contents\models\articles */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="articles-form">

    <?php $form = ActiveForm::begin(); ?>

	<?= $form->field($model, 'categories__id')->dropDownList(Categories::getCategorieslList(), ['prompt' => 'Выберите категорию']) ?>
    
	<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'short_text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'full_text')->textarea(['rows' => 6]) ?>

   <?= $form->field($model, 'is_active')->dropDownList(['1' => 'Включить', '0' => 'Выключить']) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
