<?php
/* @var $this TutorController */
/* @var $model Tutor */
?>

<?php
$this->breadcrumbs=array(
	'Tutors'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Listado de Tutores', 'url'=>array('index')),
	array('label'=>'Gestionar Tutores', 'url'=>array('admin')),
);
?>

<h1>Create Tutor</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>