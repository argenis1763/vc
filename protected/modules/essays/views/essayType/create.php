<?php
/* @var $this EssayTypeController */
/* @var $model EssayType */
?>

<?php
$this->breadcrumbs=array(
	'Essay Types'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EssayType', 'url'=>array('index')),
	array('label'=>'Manage EssayType', 'url'=>array('admin')),
);
?>

<h1>Create EssayType</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>