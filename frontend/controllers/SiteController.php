<?php

namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\Portfolio;
use common\models\Page;
use common\models\Contact;
use common\models\PortfolioSearch;
use common\models\PageSearch;
use common\models\Cofounder;
use common\models\Email;

/**
 * Site controller
 */
class SiteController extends Controller {

    public $description = '';

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                //'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions() {
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

    public function beforeAction($action) {
        if (parent::beforeAction($action)) {
            // change layout for error action
            if ($action->id == 'error')
                $this->layout = 'default';
            return true;
        } else {
            return false;
        }
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex() {
        
        $searchModel = new PortfolioSearch();
        $portfolio = $searchModel->search("");
        $portfolio->pagination = array('pageSize' => 8);
        $pages = $searchModel->search("");
        $cofounders = Cofounder::find()->where([])->all();
        
        return $this->render('index', [
                    'portfolio' => $portfolio,
                    'pages' => $pages,
                    'cofounders' => $cofounders,
        ]);
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact() {
        $this->layout = 'default';
        $model = new Contact();
        $model->is_readed = '0';
        $email = Email::findAll(['get_info' => '1']);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            foreach ($email as $v) {
                Yii::$app->mailer->compose('contact-html', ['contact' => $model])
                        ->setFrom(['priya_nugraha91@yahoo.com'])
                        ->setTo($v->email)
                        ->setSubject('You get message in Capital')
                        ->send();
            }
            Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            return $this->refresh();
        } else {
            return $this->render('contact', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout() {
        $this->layout = 'default';
        $model = Page::findOne(['name' => 'aboutus']);
        return $this->render('about', [
                    'model' => $model,
        ]);
    }

    /**
     * Finds the Page model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Page the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Page::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
