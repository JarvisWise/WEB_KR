<?php

use app\models\BlogUser;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\BlogUserSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Blog Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Blog User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username:ntext',
            'email:ntext',
            'password:ntext',
            //'authkey:ntext',
            //'image:ntext',
            [
                'format' => 'html',
                'label' => 'Image',
                'value' => function($data){
                    return Html::img($data->getImage(), ['width'=>200]);
                }
            ],
            //'accesstoken:ntext',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, BlogUser $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
