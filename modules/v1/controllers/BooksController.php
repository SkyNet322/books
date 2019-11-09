<?php

namespace app\modules\v1\controllers;

use app\models\Book;
use Yii;
use yii\filters\auth\HttpBearerAuth;
use yii\rest\Controller;
use yii\web\BadRequestHttpException;
use yii\web\NotFoundHttpException;

class BooksController extends Controller
{

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBearerAuth::class,
            'only' => ['update', 'delete'],
        ];
        return $behaviors;
    }

    /**
     * @return Book[]|array|\yii\db\ActiveRecord[]
     */
    public function actionList()
    {
        return Book::find()
            ->with('author')
            ->asArray()
            ->all();
    }

    /**
     * @param $id
     * @return Book|null
     */
    public function actionById($id)
    {
        return Book::findOne($id);
    }

    /**
     * @param $id
     * @return Book
     * @throws NotFoundHttpException
     * @throws \yii\base\InvalidConfigException
     * @throws BadRequestHttpException
     */
    public function actionUpdate()
    {
        $id = (int) Yii::$app->request->getBodyParam('id');

        if (!$id) {
            throw new BadRequestHttpException("Неправильный идентефикатор книги");
        }

        /* @var $model Book */
        $model = Book::findOne($id);

        $model->load(Yii::$app->request->getBodyParams(), '');
        $model->save();

        return $model;
    }

    /**
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     */
    public function actionDelete($id)
    {
        $model = Book::findOne($id);

        if (!$model) {
            throw new NotFoundHttpException("Книга с номером $id не найдена");
        }

        $model->delete();

        return "Книга успешно удалена";
    }
}
