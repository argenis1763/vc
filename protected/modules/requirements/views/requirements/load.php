<?php
/* @var $this RequirementsController */
/* @var $model Requirements */
?>

<?php
$this->breadcrumbs=array(
	'Requirement'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listado', 'url'=>array('index')),
	array('label'=>'Crear Requirement', 'url'=>array('create')),
	array('label'=>'Ver Requirement', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gestionar Requirements', 'url'=>array('admin')),
);
$this->menu=array(
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/list29.png") . ' Listado', 'url'=>array('index')),
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/plus27.png") . ' Crear Requirement', 'url'=>array('create')),	
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/search19.png") . ' Ver Requirement', 'url'=>array('view', 'id'=>$model->id)),
        array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/cogs3.png") . ' Gestionar Requirements', 'url'=>array('admin')),
);

?>

    <legend>Llenar campos para Requirement # <?php echo $model->id; ?></legend>

<?php $this->renderPartial('_fields', array('model'=>$model)); ?>