<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\BlogUser $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="blog-user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>
    <?= $form->field($model, 'username')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'email')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'password')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'image')->textarea(['rows' => 6]) ?>
    <!--< ?= $form->field($model, 'authkey')->textarea(['rows' => 6]) ?>-->
    <!--< ?= $form->field($model, 'accesstoken')->textarea(['rows' => 6]) ?>-->

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
