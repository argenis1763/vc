<?php
$this->breadcrumbs=array(
	'Cuestionario para antecedentes de salud'=>array('index'),
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

<legend>Detalle de Cuestionario #<?php echo $model->id; ?></legend>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'as1',
		'as2',
		'as2_indicate',
		'as3_hearing',
		'as4_visual',
		'as5_dreams_or_sleep',
		'as6_practices_sport',
		'as7_lost_memory',
		'as8',
		'as9',
		'as10',
		'as11',
		'questionnaires_id',
	),
)); ?>
