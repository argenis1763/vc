<?php
$this->breadcrumbs=array(
	'Cuestionario para estudiantes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/list29.png") . 'Listado','url'=>array('index')),
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/plus27.png") . 'Creaar Cuestionario','url'=>array('create')),
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/font2.png") . 'Editar Cuestionario','url'=>array('update','id'=>$model->id)),
	//array('label'=>'Eliminar Cuestionario','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/cogs3.png") . 'Gestionar Cuestionario','url'=>array('admin')),
);
?>

<legend>Detalle de cuestionario para estudiantes #<?php echo $model->id; ?></legend>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'est1',
		'est2',
		'est3',
		'est4',
		'est5',
		'est6',
		'est7',
		'est8',
		'questionnaires_id',
	),
)); ?>
