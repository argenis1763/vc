<?php
/* @var $this EssaysController */
/* @var $model Essays */
?>

<?php
$this->breadcrumbs=array(
	'Essays'=>array('index'),
	'Crear',
);

$this->menu=array(
	//array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/list29.png") . 'Listado de Essays', 'url'=>array('index')),
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/cogs3.png") . 'Gestión de Essays', 'url'=>array('admin')),
);
?>

<legend>Crear Essay</legend>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>