<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Author;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AuthorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Authors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="author-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Author', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'id',
            'first_name',
            'middle_name',
            'last_name',
            [
                'label' => 'Всего книг',
                'value' => function (Author $author) {
                    return $author->getBooksCount();
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
