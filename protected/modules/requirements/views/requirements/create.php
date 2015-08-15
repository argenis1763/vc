<?php
/* @var $this RequirementsController */
/* @var $model Requirements */
?>

<?php
$this->breadcrumbs=array(
	'Requirements'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Listado de Requirements', 'url'=>array('index')),
	array('label'=>'Gestionar Requirements', 'url'=>array('admin')),
);

$this->menu=array(
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/list29.png") . ' Listado', 'url'=>array('index')),
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/cogs3.png") . ' Gestionar Requirements', 'url'=>array('admin')),
);
?>

<legend>Crear Requirement</legend>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>