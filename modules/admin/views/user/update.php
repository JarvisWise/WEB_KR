<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\BlogUser $model */

$this->title = 'Update Blog User: ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Blog Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="blog-user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
