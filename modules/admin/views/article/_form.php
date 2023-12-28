<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Article $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>
    <?= $form->field($model, 'title')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <!--< ?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>-->

    <?= $form->field($model, 'image_path')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'markers')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'date')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'user_id')->textInput() ?>
    <?= $form->field($model, 'topic_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
