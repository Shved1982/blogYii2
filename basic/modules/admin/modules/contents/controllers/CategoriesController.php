<?php

namespace app\modules\admin\modules\contents\controllers;

use Yii;
use app\modules\admin\modules\contents\models\Categories;
use app\modules\admin\modules\contents\models\Articles;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * Контроллер управления категориями блога
 */
class CategoriesController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Метод генерации списка категорий блога
     * @return mixed
     */
    public function actionIndex()
    {
		$this->layout = '//admin';
		
        $dataProvider = new ActiveDataProvider([
            'query' => Categories::find(),
		    'pagination' => [
				'pageSize' => 25,
			],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Метод просмотра категории блога
     * @param integer $id уникальный идентификатор категории
     * @return mixed
     */
    public function actionView($id)
    {
		$this->layout = '//admin';
        
		return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Метод создания новой категории блога
     * Если создание пройдет успешно, то браузер перенаправится на  старницу просмотра категории
     * @return mixed
     */
    public function actionCreate()
    {
		$this->layout = '//admin';
		
        $model = new Categories();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Редактирование существующей категории
     * Если редактирование пройдет успешно, то браузер перенаправится на  старницу просмотра категории
     * @param integer $id уникальный идентификатор категории блога
     * @return mixed
     */
    public function actionUpdate($id)
    {
		$this->layout = '//admin';
		
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

	/**
     * Метод удаления категории блога
     * Если удаление пройдет успешно, то браузер перенаправится на  старницу со списком категорий
     * @param integer $id уникальный идентификатор категории блога
     * @return mixed
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
		$model->is_active  = (int)FALSE;
		$model->save();
		
		$articles = Articles::find()->byCategories($id)->all();
		foreach($articles as $article)
		{
			$article->is_active = (int)FALSE;
			$article->save();
		}
        return $this->redirect(['index']);
    }

    /**
     * Метод поиска категории по уникальному идентификатору (первичному ключу)
     * Если категория не будет найдена то будет вызвано 404 исключение
     * @param integer $id уникальный идентификатор категории блога
     * @return articles экземпляр класса Аrticles 
     * @throws NotFoundHttpException если запись не будет найдена
     */
    protected function findModel($id)
    {
        if (($model = Categories::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
