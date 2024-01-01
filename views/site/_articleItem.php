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

<div class="flex_items">
    <div class="flex_item_1">
        <h2><?=$model->title;?> (Topic: <?=Topic::getNameById($model->topic_id);?>)</h2>
    </div>
    <p><?=Article::contentPreview($model->description, 800);?> </p>
    <div class="flex_item_2">
        <p><?= Html::a('Read more...', ['article-view', 'id' => $model->id], ['class' => 'btn button_read_more']) ?></a></p>
        <p style="display: inline-block;"><i>Published (<?=BlogUser::getUsernameById($model->user_id);?>): <?=$model->date;?> </i></p>
    </div>
</div>