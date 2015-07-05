<?php

namespace app\modules\oauth\controllers;

use yii\web\Controller;

class CallbackController extends Controller
{
    public function actionIndex()
    {
        var_dump($_POST); die;
    }
}
