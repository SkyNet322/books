<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Book;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Книги';
?>
<div class="book-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            [
                'attribute' => 'id',
                'label' => 'Номер',
            ],
            [
                'label' => 'Автор',
                'value'     => function (Book $book) {
                    return $book->author->fullName;
                }
            ],
            'title',
        ],
    ]); ?>

</div>