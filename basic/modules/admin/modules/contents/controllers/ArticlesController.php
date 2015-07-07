<?php

namespace app\modules\admin\modules\contents\controllers;

use Yii;
use app\modules\admin\modules\contents\models\Articles;
use app\modules\admin\modules\contents\models\Categories;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * Контроллер управления статьями блога
 */
class ArticlesController extends Controller
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
     * Метод генерации списка статей блога
     * @return mixed
     */
    public function actionIndex()
    {
		$this->layout = '//admin';
		
        $dataProvider = new ActiveDataProvider([
            'query' => Articles::find(),
			'pagination' => [
				'pageSize' => 25,
			],
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Метод просмотра статьи блога
     * @param integer $id уникальный идентификатор статьи
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
     * Метод создания новой статьи блога
     * Если создание пройдет успешно, то браузер перенаправится на  старницу просмотра статьи
     * @return mixed
     */
    public function actionCreate()
    {
		$this->layout = '//admin';
		
        $model = new Articles();
		$model->date_public = date("Y-m-d H:i:s");
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Редактирование существующей статьи
     * Если редактирование пройдет успешно, то браузер перенаправится на  старницу просмотра статьи
     * @param integer $id уникальный идентификатор статьи блога
     * @return mixed
     */
    public function actionUpdate($id)
    {
		$this->layout = '//admin';
		
        $model = $this->findModel($id);
		$model->date_public = date("Y-m-d H:i:s");
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Метод удаления статьи блога
     * Если удаление пройдет успешно, то браузер перенаправится на  старницу со списком статей
     * @param integer $id уникальный идентификатор статьи блога
     * @return mixed
     */
    public function actionDelete($id)
    {
		$model = $this->findModel($id);
		$model->is_active  = (int)FALSE;
		$model->save();

        return $this->redirect(['index']);
    }

    /**
     * Метод поиска статьи по уникальному идентификатору (первичному ключу)
     * Если статья не будет найдена то будет вызвано 404 исключение
     * @param integer $id уникальный идентификатор статьи блога
     * @return articles экземпляр класса Аrticles 
     * @throws NotFoundHttpException если запись не будет найдена
     */
    protected function findModel($id)
    {
        if (($model = Articles::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
