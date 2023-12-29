<?php
use yii\helpers\Html;
use app\models\Article;
use app\models\BlogUser;
use app\models\Topic;
?>  

<style>
    .div-center {
        margin: 0 auto;
        width: auto;
        display: block;
    }
</style>

<div class="col-lg-9 mb-5 div-center">
    <div style="display: flex; justify-content: space-between;">
        <h2 style="display: inline-block;"><?=$model->title;?> (Topic: <?=Topic::getNameById($model->topic_id);?>)</h2>
        <p style="display: inline-block;"><i>Published (<?=BlogUser::getUsernameById($model->user_id);?>): <?=$model->date;?> </i></p>
    </div>
    <p><?=Article::contentPreview($model->description, 800);?> </p>
    <p><?= Html::a('Read more...', ['article-view', 'id' => $model->id], ['class' => 'btn btn-outline-secondary']) ?></a></p>
</div>