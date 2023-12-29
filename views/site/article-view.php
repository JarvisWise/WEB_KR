<?php
use yii\helpers\Html;
use app\models\Article;
use app\models\BlogUser;
use app\models\Topic;
use app\models\CommentSearch;
use app\models\Comment;
use yii\widgets\ListView;
use yii\widgets\ActiveForm;
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
    <div>
        <p><?=Html::img($model->getImage(), ['width' => 300]);?> </p>
        <p><?=$model->description;?> </p>
    </div>
    
    
</div>

<?php 
    $searchModel = new CommentSearch();
    $dataProvider = $searchModel->searchByArticleId(Yii::$app->request->queryParams, $model->id);
?>
<div class="body-content">
    <?php echo ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView' => '_commentItem',
        'summary'=>'', 
    ]); ?>
</div>

<div class="comment-form">

    <?php $form = ActiveForm::begin([
        'action' => ['/site/comment-create'],
        'method' => 'post',
    ]); ?>
    <?php $comment = new Comment(); ?>

    <?php if (isset($reply)) { ?>
        <h2 style="display: inline-block;">Write your reply</h2>
        <p style="display: inline-block;"><?= Html::a('Reset', ['article-view', 'id' => $model->id], ['class' => 'btn btn-success']) ?></a></p>
        <?= $form->field($comment, 'parent_id')->hiddenInput(['value'=> $reply->id])->label(false); ?>
    <?php } else { ?>
        <h2>Write your comment</h2>
    <?php } ?>

    <?= $form->field($comment, 'id')->hiddenInput(['value'=> Comment::getFreeId()])->label(false); ?>
    <?= $form->field($comment, 'article_id')->hiddenInput(['value'=> $model->id])->label(false); ?>

    <?php if (Yii::$app->user->isGuest) { ?>
        <?= $form->field($comment, 'username')->textInput() ?>
    <?php } else { ?>
        <?= $form->field($comment, 'username')->hiddenInput(['value'=> Yii::$app->user->identity->username])->label(false); ?>
        <?= $form->field($comment, 'user_id')->hiddenInput(['value'=> Yii::$app->user->identity->id])->label(false); ?>
    <?php } ?>

    <?= $form->field($comment, 'text')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Create Comment', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

