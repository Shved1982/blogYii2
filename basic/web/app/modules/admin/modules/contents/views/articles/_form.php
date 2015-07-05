<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\modules\contents\models\articles */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="articles-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'categories__id')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_public')->textInput() ?>

    <?= $form->field($model, 'short_text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'full_text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'is_active')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
