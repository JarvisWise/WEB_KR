<?php

/** @var yii\web\View $this */

$this->title = 'IT Club News';
Yii::$app->name = 'IT Club News';
use yii\widgets\ListView;
?>
<div class="site-index">
    <div class="body-content">
        <?php echo ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_articleItem',
            'summary'=>'', 
        ]); ?>
    </div>
</div>
