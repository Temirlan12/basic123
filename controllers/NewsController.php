<?php

namespace app\controllers;


use phpDocumentor\Reflection\Types\Null_;
use Yii;
use app\models\News;
use app\models\NewsSearch;
use yii\data\ActiveDataProvider;
use yii\rest\CreateAction;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use HttpException;

/**
 * NewsController implements the CRUD actions for News model.
 */
class NewsController extends Controller
{
    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;

        return parent::beforeAction($action);
    }

    /**
     * {@inheritdoc}
     */
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


    /**
     * Lists all News models.
     * @return mixed
     */

    public function actionIndex()
    {
        $page = $_GET['page'];
        $limit = 2;

        $offset = ($page-1)*$limit;

        $model = News::find()->limit($limit)->offset($offset)->all();
        $all = News::find()->count();
        $pages = ceil($all / $limit);

        return $this->render('index', [
              'model' => $model,
              'pages' => $pages,
              'data' => Yii::$app->request->post(),
        ]);

    }
    public function actionCreate()
    {
        if (Yii::$app->request->post()) {
            $mod = new News();
            $params = Yii::$app->request->post();
            $mod->title = $params['title'];
            $mod->text = $params['text'];
            $mod->save();
        }
        $this->view->title = 'Все статьи';
        return $this->render('create',[
            'mod' => $mod
        ]);

    }

    public function actionEdit($id=Null)
    {
        $model = News::findOne($id);
        if ($model -> load(Yii::$app->request->post())){
            $model->save();
            return $this->redirect("/news/index");
        }
        return $this->render('edit',['model'=>$model]);


    }
    public function actionTikdel($id=Null)
    {
        $mod = News::findOne($id);
        $mod->Delete();
        return $this->redirect("/news/index");
    }



    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }



    protected function findModel($id)
    {
        if (($model = News::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
?>
