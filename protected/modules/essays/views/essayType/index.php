<?php
/* @var $this EssayTypeController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Essay Types',
);

$this->menu=array(
	array('label'=>'Create EssayType','url'=>array('create')),
	array('label'=>'Manage EssayType','url'=>array('admin')),
);
?>

<h1>Essay Types</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>