<?php
$this->breadcrumbs=array(
	'Questionnaires Parents Fields'=>array('index'),
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

<legend>Detalle de cuestionario para padres y representantes #<?php echo $model->id; ?></legend>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'pad1',
		'pad2',
		'pad3',
		'pad4',
		'pad5',
		'pad6',
		'pad7',
		'pad8',
		'pad9',
		'pad10',
		'pad11',
		'pad12',
		'pad13',
		'pad14',
		'pad15',
		'pad16',
		'pad17',
		'questionnaires_id',
	),
)); ?>
