<?php

namespace app\modules\oauth\helpers;

use yii\helpers\Html;
use Yii;

class Gmail
{
    public static function sendPost($code = FALSE)
    {
        if($code == FALSE || empty($code))
		{
			throw new \yii\web\HttpException(403, 'Не верный запрос POST. Доступ запрещен!!!', 403);
		}
		
		if( $curl = curl_init() ) 
		{
			curl_setopt($curl, CURLOPT_URL, 'https://accounts.google.com/o/oauth2/token');
			curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
			curl_setopt($curl, CURLOPT_POST, true);
			curl_setopt($curl, CURLOPT_POSTFIELDS, "code=" . $code . "&client_id=" . Yii::$app->params['client_id'] . "&client_secret=" . Yii::$app->params['secret_key'] . "&redirect_uri=" . Yii::$app->params['redirect_uri'] . "&grant_type=authorization_code");
			$out = curl_exec($curl);
			curl_close($curl);
		}
		
		$result = json_decode($out);
		
		return $result->access_token;
	}
	
	public static function sendGet($access_token = FALSE)
    {
        if($access_token == FALSE || empty($access_token))
		{
			throw new \yii\web\HttpException(403, 'Не верный запрос GET. Ваш уникальный код не верен!!!', 403);
		}
		
		if( $curl = curl_init() ) 
		{
			curl_setopt($curl, CURLOPT_URL, 'https://www.googleapis.com/oauth2/v1/userinfo?access_token=' . $access_token);
			curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
			$outGet = curl_exec($curl);
			curl_close($curl);
		}
		
		
		$result = json_decode($outGet);
		
		return $result;
	}
	
}
