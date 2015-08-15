<?php
/* @var $this EssaysController */
/* @var $model Essays */
?>

<?php
$this->breadcrumbs=array(
	'Essays'=>array('index'),
	$model->title=>array('view','id'=>$model->id_essays),
	'Actualizar',
);

$this->menu=array(
	//array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/list29.png") . 'Listado Essays', 'url'=>array('index')),
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/plus27.png") . 'Crear Essay', 'url'=>array('create')),
	//array('label'=>'View Essays', 'url'=>array('view', 'id'=>$model->id_essays)),
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/cogs3.png") . 'Gestión de Essays', 'url'=>array('admin')),
);
?>

    <legend>Actualizar Essay # <?php echo $model->id_essays; ?></legend>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>