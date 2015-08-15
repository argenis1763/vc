<?php
/* @var $this StudentsController */
/* @var $model Students */
?>

<?php
$this->breadcrumbs=array(
	'Students'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Students', 'url'=>array('index')),
	array('label'=>'Manage Students', 'url'=>array('admin')),
);
?>

<h1>Create Students</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>