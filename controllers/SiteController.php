<?php

namespace app\controllers;


use app\models\Theme;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\AddQuestionForm;
use app\models\User;



class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
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
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {

        return $this->render('index');
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
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        $model->password = '';
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


    public function actionAddQuestion()
    {
        $model = new AddQuestionForm();

        if(!empty($model)) {

            if ($model->load(Yii::$app->request->post()) && $model->validate()) {

                $model->addQuestion();

                Yii::$app->session->setFlash('AddQuestionFormSubmitted');

                return $this->refresh();
            }
            return $this->render('add-question', [
                'model' => $model,
            ]);
        }

    }

    public function actionError()
    {

        $exception = Yii::$app->errorHandler->exception;
        $message = $exception->getMessage();

        if ($exception !== null) {
            return $this->render('error', ['exception' => $exception, 'message' => $message]);
        }
    }
}
