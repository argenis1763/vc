<?php
$this->breadcrumbs=array(
	'Majors'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/list29.png") . 'Listado de Majors','url'=>array('index')),
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/cogs3.png") . 'Gestionar Majors','url'=>array('admin')),
);
?>

<legend>Crear Major</legend>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>