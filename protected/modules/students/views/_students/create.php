<?php
$this->breadcrumbs=array(
	'Students'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Students','url'=>array('index')),
	array('label'=>'Manage Students','url'=>array('admin')),
);
?>

<legend>Crear Estudiantes</legend>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>