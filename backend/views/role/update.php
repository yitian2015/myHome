<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Button;

?>

<h1>role/update</h1>

<?= Html::a('添加', ['role/create', 'item_name' => Yii::$app->request->get('item_name')], ['class' => 'btn btn-success ', 'style'=>'float:right;margin:5px;']) ?>
<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        'name',
        'description',
          [
		'class' => 'yii\grid\ActionColumn',
		'header'=>'Edit',
		'template'=>'{delete}',
	],
    ],
]) ?>

