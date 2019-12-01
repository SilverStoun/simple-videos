<?php

namespace app\controllers;

use yii\web\Controller;
use yii\web\Response;

class DashboardController extends Controller
{
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
