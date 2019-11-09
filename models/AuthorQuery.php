<?php

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\Expression;

class AuthorQuery extends ActiveQuery
{
    public function withFullName()
    {
        $this->select(
            [
                '*',
                new Expression("CONCAT(first_name, ' ', middle_name, ' ', last_name) AS full_name")
            ]
        );
        return $this;
    }
}