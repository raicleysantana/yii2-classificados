<?php

namespace frontend\controllers;

use cheatsheet\Time;
use common\models\Curtida;
use common\models\User;
use common\models\Vaga;
use common\sitemap\UrlsIterator;
use frontend\models\ContactForm;
use Sitemaped\Element\Urlset\Urlset;
use Sitemaped\Sitemap;
use Yii;
use yii\data\ActiveDataProvider;
use yii\filters\PageCache;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @return array
     */
    public function behaviors()
    {
        return [
            [
                'class' => PageCache::class,
                'only' => ['sitemap'],
                'duration' => Time::SECONDS_IN_AN_HOUR,
            ]
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction'
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null
            ],
            'set-locale' => [
                'class' => 'common\actions\SetLocaleAction',
                'locales' => array_keys(Yii::$app->params['availableLocales'])
            ]
        ];
    }

    /**
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Vaga::find(),
            'pagination' => [
                'pageSize' => 20,
            ]
        ]);

        return $this->render('index', ['dataProvider' => $dataProvider]);
    }

    /**
     * @return string|Response
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($model->contact(Yii::$app->params['adminEmail'])) {
                Yii::$app->getSession()->setFlash('alert', [
                    'body' => Yii::t('frontend', 'Thank you for contacting us. We will respond to you as soon as possible.'),
                    'options' => ['class' => 'alert-success']
                ]);
                return $this->refresh();
            }

            Yii::$app->getSession()->setFlash('alert', [
                'body' => \Yii::t('frontend', 'There was an error sending email.'),
                'options' => ['class' => 'alert-danger']
            ]);
        }

        return $this->render('contact', [
            'model' => $model
        ]);
    }

    /**
     * @param string $format
     * @param bool $gzip
     * @return string
     * @throws BadRequestHttpException
     */
    public function actionSitemap($format = Sitemap::FORMAT_XML, $gzip = false)
    {
        $links = new UrlsIterator();
        $sitemap = new Sitemap(new Urlset($links));

        Yii::$app->response->format = Response::FORMAT_RAW;

        if ($gzip === true) {
            Yii::$app->response->headers->add('Content-Encoding', 'gzip');
        }

        if ($format === Sitemap::FORMAT_XML) {
            Yii::$app->response->headers->add('Content-Type', 'application/xml');
            $content = $sitemap->toXmlString($gzip);
        } else if ($format === Sitemap::FORMAT_TXT) {
            Yii::$app->response->headers->add('Content-Type', 'text/plain');
            $content = $sitemap->toTxtString($gzip);
        } else {
            throw new BadRequestHttpException('Unknown format');
        }

        $linksCount = $sitemap->getCount();
        if ($linksCount > 50000) {
            Yii::warning(\sprintf('Sitemap links count is %d'), $linksCount);
        }

        return $content;
    }

    public function actionView_vaga($id)
    {
        $model = Vaga::findOne($id);

        return $this->render('view_vaga', ['model' => $model]);
    }

    public function actionCurtir($id)
    {
        $ip = Yii::$app->request->getUserIP();
        $userId = Yii::$app->user->id;

        $vaga = $this->findVagaModel($id);

        $model = Curtida::find()->where(['vaga_id' => $id])
            ->andWhere(['or', ['ip' => $ip], ['user_id' => $userId]])
            ->one();

        if (!$model) {
            $model = new Curtida();

            $model->user_id = $userId;
            $model->ip = $ip;
            $model->vaga_id = $id;
            if ($model->save(false)) {
                $vaga->incrementaCurtida();
            }

        }

    }

    public function actionDescurtir($id)
    {
        $ip = Yii::$app->request->getUserIP();
        $userId = Yii::$app->user->id;

        $vaga = $this->findVagaModel($id);

        $model = Curtida::find()
            ->andWhere(['or', ['ip' => $ip], ['user_id' => $userId]])
            ->one();

        if ($model) {
            $vaga->decrementaCurtida();
            $model->delete();
        }
    }

    protected function findVagaModel($id)
    {
        if (($model = Vaga::findOne($id)) !== null) {
            return $model;
        }
    }
}
