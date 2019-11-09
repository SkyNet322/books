<?php

namespace app\commands;

use app\models\Moderator;
use yii\console\Controller;

class ModeratorController extends Controller
{
    public function actionRegister($user, $password)
    {
        $model = new Moderator();
        $model->username = $user;
        $model->password = $model->hashPassword($password);
        $model->token = $model->generateToken();
        $model->save();

        if ($model->hasErrors()) {
            return $model->getErrors();
        }

        echo "Модератор успешно добавлен. Token $model->token";
    }
}
