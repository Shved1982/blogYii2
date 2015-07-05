<?php

namespace app\modules\blog\controllers;

use yii\web\Controller;
use app\modules\admin\modules\contents\models\Categories;
use app\modules\admin\modules\contents\models\Articles;

class ArticlesController extends Controller
{
    public function actionView($id = FALSE)
    {
		if($id == FALSE && isset($_GET) && array_key_exists('id', $_GET))
		{
			$id = $GET['id'];
		}
		elseif($id == FALSE && !isset($_GET))
		{
			throw new \yii\web\HttpException(404, 'Страница не найдена', 404);
		}
		
		$article = Articles::find()->where(['id' => $id])->active()->one();
		
		if(!($article instanceof Articles))
		{
			throw new \yii\web\HttpException(404, 'Страница не найдена', 404);
		}
        		
        return $this->render('view',[
			'article' => $article
		]);
    }
}
