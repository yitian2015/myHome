<?php
/* @var $this yii\web\View */
use yii\grid\GridView;
?>

<h1>admin/index</h1>


<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'id',
        'username',
	'email',
          [
		'class' => 'yii\grid\ActionColumn',
		'header'=>'Edit',
	],
    ],
]) ?>

