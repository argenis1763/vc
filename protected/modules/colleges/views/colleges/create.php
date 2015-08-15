<?php
$this->breadcrumbs=array(
	'Colleges'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/list29.png") . 'Listado de Colleges','url'=>array('index')),
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/cogs3.png") . 'Gestión de Colleges','url'=>array('admin')),
);
?>

<legend>Crear College</legend>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>