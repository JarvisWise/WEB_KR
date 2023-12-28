<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\BlogUser $model */

$this->title = 'Create Blog User';
$this->params['breadcrumbs'][] = ['label' => 'Blog Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="blog-user-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
