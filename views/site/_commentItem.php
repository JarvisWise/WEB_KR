<?php
use yii\helpers\Html;
use app\models\Article;
use app\models\Comment;
use app\models\BlogUser;
use app\models\Topic;
use yii\widgets\ActiveForm;
?>  

<style>
    .comment-div-center {
        margin: 0 auto;
    }
</style>

<div class="col-lg-6 mb-5 comment-div-center">
    <div style="display: flex; justify-content: space-between;">
        <div style="display: inline-block;"> 
            <h2 style="display: inline-block;"><?=$model->username;?></h2>
            <p style="display: inline-block;"><i>(<?=$model->date;?>)</i></p>   
            <?php if (null !== $model->parent_id) { ?>
                <p style="display: inline-block;">Replied to: <?=Comment::getUsernameByParentId($model->parent_id);?></p>
            <?php } ?>
        </div>
        
        <div class="form-group" style="display: inline-block;">
            <?= Html::submitButton('Reply', ['class' => 'btn btn-success', 'onclick' => "onClickFunction()"]) ?>
        </div>
    </div>
    <div class="comment-form">
        <?php $form = ActiveForm::begin([
            'action' => ['/site/set-reply'],
            'method' => 'post',
        ]); ?>
        <?php $comment = new Comment(); ?>
        <?= $form->field($comment, 'parent_id')->hiddenInput(['value'=> $model->id])->label(false); ?>
        <?= $form->field($comment, 'article_id')->hiddenInput(['value'=> $model->article_id])->label(false); ?>

        <?php ActiveForm::end(); ?>
    </div>
    <p><?=$model->text;?> </p>
</div>