<?php
use yii\helpers\Html;
use app\modules\admin\modules\contents\models\Categories;
use app\modules\admin\modules\contents\models\Articles;
use yii\widgets\LinkPager;
/* @var $this yii\web\View */
$this->title = 'Yii2 Blog with Google API';
?>

<div class="blog-default-index col-lg-10">
<a href="https://accounts.google.com/o/oauth2/auth?redirect_uri=<?=Yii::$app->params['redirect_uri']?>&response_type=code&client_id=<?=Yii::$app->params['client_id']?>&scope=https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.email+https%3A%2F%2Fwww.googleapis.com%2Fauth%2Fuserinfo.profile" title="Войти через Google" class="btn btn-primary">Войти через Google</a>
<h2>Список категорий:</h2>
    <?foreach($categories as $categorie):?>
		<p><?= Html::a(Html::encode($categorie->name), ['/blog/default/view', 'id' => $categorie->id]) ?></p>
	<?endforeach;?>
	<?php
		echo LinkPager::widget([
			'pagination' => $pages,
		]);
	?>
</div>
        