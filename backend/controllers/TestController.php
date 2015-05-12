<?php

namespace backend\controllers;

use yii\web\Controller;

class TestController extends DController
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
