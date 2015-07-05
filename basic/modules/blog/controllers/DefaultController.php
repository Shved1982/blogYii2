<?php

namespace app\modules\blog\controllers;

use yii\web\Controller;
use app\modules\admin\modules\contents\models\Categories;
use app\modules\admin\modules\contents\models\Articles;

class DefaultController extends Controller
{
    public function actionIndex()
    {
		$categories = Categories::find()->active();
		
		$countQuery = clone $categories;
		$pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => Yii::$app->params['pageSize']]);
		$pages->pageSizeParam = false;
		$post = $categories->offset($pages->offset)
					->limit($pages->limit)
					->orderBy('id desc')
					->all();

        return $this->render('index',[
			'categories' => $post,
			'pagenator' => $pages,
		]);
    }
	
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
		$categorie = Categories::find()->where(['id' => $id])->with('articles')->active()->one();
		
		$countQuery = clone $categorie;
		$pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => Yii::$app->params['pageSize']]);
		$pages->pageSizeParam = false;
		$post = $categorie->offset($pages->offset)
					->limit($pages->limit)
					->all();
					
		if(!($categorie instanceof Categories))
		{
			throw new \yii\web\HttpException(404, 'Страница не найдена', 404);
		}
        return $this->render('view',[
			'categorie' => $categorie,
			'pages' => $pages,
		]);
    }
}
