<?php

namespace app\modules\oauth\controllers;

use yii\web\Controller;
use Yii;
use app\modules\oauth\helpers\Gmail;

class CallbackController extends Controller
{
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
