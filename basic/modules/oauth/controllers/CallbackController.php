<?php

namespace app\modules\oauth\controllers;

use yii\web\Controller;
use Yii;
use app\modules\oauth\helpers\Gmail;

/**
 * Контроллер получения и просмотра учетных данных из Gmail
 */
class CallbackController extends Controller
{
	/**
     * Метод генерации списка учетных данных
	 * Если не будет получен ответ от Gmail то будет вызвано 403 исключение
     * @return mixed
	 * @throws NotFoundHttpException нет ответа от Gmail
     */
    public function actionIndex()
    {
        if(!isset($_GET) || !array_key_exists('code', $_GET))
		{
			throw new \yii\web\HttpException(403, 'Не верный запрос. Доступ запрещен!!!', 403);
		}
		
		$code = $_GET['code'];
		
		$access_token = Gmail::sendPost($code);
		
		$profile = Gmail::sendGet($access_token);
		
		return $this->render('index',[
			'profile' => $profile
		]);
    }
}
