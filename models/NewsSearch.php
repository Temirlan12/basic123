<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\News;
use yii\data\Pagination;
use yii\web\Controller;


class NewsSearch extends Controller
{
    public function search()
{
    $searchModel = new FlightsSearch();
    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

    return $this->render('search-flight', [
        'dataProvider' => $dataProvider,
    ]);

}
}
