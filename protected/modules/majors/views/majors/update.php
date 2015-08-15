<?php
$this->breadcrumbs=array(
	'Majors'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/list29.png") . 'Listado de Majors','url'=>array('index')),
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/plus27.png") . 'Crear Major','url'=>array('create')),
	//array('label'=>'Ver Major','url'=>array('view','id'=>$model->id)),
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/cogs3.png") . 'Gestionar Majors','url'=>array('admin')),
);
?>

<legend>Actualizar Major # <?php echo $model->id; ?></legend>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>