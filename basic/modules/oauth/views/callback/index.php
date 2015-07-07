<?
use yii\helpers\Html;
?>
<div class="oauth-default-index col-lg-10">
	<h2>Здравствуйте ув. <?=Html::encode($profile->name)?>! Ваш профиль в Google:</h2>
	<hr>
	<div class="form-group field-categories-name">
		<label class="control-label" for="categories-name">E-mail:</label>
		<input type="text" class="form-control" maxlength="255" readonly value="<?=Html::encode($profile->email)?>">
	</div>
	<hr>
	<div class="form-group field-categories-name">
		<label class="control-label" for="categories-name">Имя:</label>
		<input type="text" class="form-control" maxlength="255" readonly value="<?=Html::encode($profile->name)?>">
	</div>
	<hr>
	<div class="form-group field-categories-name">
		<label class="control-label" for="categories-name">Отчество:</label>
		<input type="text" class="form-control" maxlength="255" readonly value="<?=Html::encode($profile->given_name)?>">
	</div>
	<hr>
	<div class="form-group field-categories-name">
		<label class="control-label" for="categories-name">Фамилия:</label>
		<input type="text" class="form-control" maxlength="255" readonly value="<?=Html::encode($profile->family_name)?>">
	</div>
	<hr>
	<div class="form-group field-categories-name">
		<label class="control-label" for="categories-name">Ссылка на Google+:</label>
		<a href="<?=Html::encode($profile->link)?>" class="form-control"><?=Html::encode($profile->link)?></a>
	</div>
	<hr>
	<div class="form-group field-categories-name">
		<label class="control-label" for="categories-name">Пол:</label>
		<?$gender = $profile->gender == 'male'? 'Мужской': 'Женский'?>
		<input type="text" class="form-control" maxlength="255" readonly value="<?=Html::encode($gender)?>">
	</div>
	<hr>
	<div class="form-group field-categories-name">
		<label class="control-label" for="categories-name">Фото:</label>
		<img src="<?=$profile->picture?>" />
	</div>
</div>
