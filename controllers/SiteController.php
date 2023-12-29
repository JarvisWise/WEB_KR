<?php

namespace app\controllers;

use app\models\Article;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\BlogLoginForm;
use app\models\ContactForm;
use app\models\ArticleSearch;
use app\models\Comment;
use app\models\Logs;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex(){
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->searchAll($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    //Science - 1
    public function actionScience() {
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->searchByTopic($this->request->queryParams, 1);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    //Education - 2
    public function actionEducation(){
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->searchByTopic($this->request->queryParams, 2);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    //Trends - 3
    public function actionTrends(){
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->searchByTopic($this->request->queryParams, 3);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    //AI - 4
    public function actionAi(){
        $searchModel = new ArticleSearch();
        $dataProvider = $searchModel->searchByTopic($this->request->queryParams, 4);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }


    // view article
    public function actionArticleView($id) {
        $model = Article::getArticleById($id);

        return $this->render('article-view', [
            'model' => $model,
        ]);
    }

    //create comment
    public function actionCommentCreate() {
        $model = new Comment();

        if ($this->request->isPost) {
  
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['site/article-view', 'id' => $model->article_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->redirect(['site/article-view', 'id' => $this->request->post('Comment')['article_id']]);

    }

    //set reply 
    public function actionSetReply() {
        $reply = Comment::getById($this->request->post('Comment')['parent_id']);
        $model = Article::getArticleById($this->request->post('Comment')['article_id']);

        if ($this->request->isPost) {
            return $this->render('article-view', [
                'model' => $model,
                'reply' => $reply,
            ]);
        } 

        return $this->redirect(['site/article-view', 'id' => $this->request->post('Comment')['article_id']]);
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new BlogLoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
