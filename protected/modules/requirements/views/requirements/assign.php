<?php
$this->breadcrumbs=array(
	'Colleges'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/list29.png") . ' Listado', 'url'=>array('index')),
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/cogs3.png") . ' Administrar Requisitos', 'url'=>array('admin')),
);
?>

<legend>Asignar Requisito a Estudiante</legend>

<?php echo $this->renderPartial('_student', array('model'=>$model, 'student'=>$student)); ?>