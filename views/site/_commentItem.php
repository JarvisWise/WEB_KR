<?php
use yii\helpers\Html;
use app\models\Article;
use app\models\Comment;
use app\models\BlogUser;
use app\models\Topic;
use yii\widgets\ActiveForm;
?>  

<style>
    /*.comment-div-center {*/
    /*    margin: 0 auto;*/
    /*}*/
</style>

<div>
    <div>
        <div style="display: flex; justify-content: space-between;">
            <div>
                <h2><?=$model->username;?></h2>
                <?php if (null !== $model->parent_id) { ?>
                    <p>Replied to: <?=Comment::getUsernameByParentId($model->parent_id);?></p>
                <?php } ?>
            </div>
            <p><i>(<?=$model->date;?>)</i></p>
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

    <div class="form-group" style="display: flex; justify-content: flex-end;">
        <?= Html::submitButton('Reply', ['class' => 'btn btn-success', 'onclick' => "onClickFunction()"]) ?>
    </div>
</div>