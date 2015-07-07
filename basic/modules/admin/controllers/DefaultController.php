<?php

namespace app\modules\admin\controllers;

use yii\web\Controller;

/**
* Модуль управления админ панелью
*/
class DefaultController extends Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }
}
