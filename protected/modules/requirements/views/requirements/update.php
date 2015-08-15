<?php
/* @var $this RequirementsController */
/* @var $model Requirements */
?>

<?php
$this->breadcrumbs=array(
	'Requirements'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/list29.png") . ' Listado', 'url'=>array('index')),
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/plus27.png") . ' Crear Requirement', 'url'=>array('create')),
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/cogs3.png") . ' Gestionar Requirements', 'url'=>array('admin')),
);
?>

    <legend>Actualizar Requisito # <?php echo $model->id; ?></legend>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>