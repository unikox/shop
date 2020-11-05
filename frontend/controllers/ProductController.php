<?php

namespace frontend\controllers;

use Yii;
use app\models\Product;
use app\models\Productimage;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

class ProductController extends Controller
{

    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }


    public function actionView($id)
    {
        $img = new Productimage();
        $imglist = $img->getImagesList($id);

        return $this->render('view', [
            'model' => $this->findModel($id),
            'imagelist' => $imglist,
        ]);
    }


    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
