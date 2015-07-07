<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\data\Pagination;
use app\models\LoginForm;
use app\models\ContactForm;
use app\modules\admin\modules\contents\models\Categories;
use app\modules\admin\modules\contents\models\Articles;

class SiteController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
	
	/**
	*	Метод вывода главной страницы сайта
	*	ничего не возвращает
	*/

    public function actionIndex()
    {
		$categories = Categories::find()->active();
		
		$countQuery = clone $categories;
		$pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => Yii::$app->params['pageSize']]);
		$pages->pageSizeParam = false;
		$post = $categories->offset($pages->offset)
					->limit($pages->limit)
					->all();

        return $this->render('index',[
			'categories' => $post,
			'pages' => $pages,
		]);
    }