<?php
$this->breadcrumbs=array(
	'Questionnaires'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Questionnaires','url'=>array('index')),
	array('label'=>'Create Questionnaires','url'=>array('create')),
	array('label'=>'Update Questionnaires','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Questionnaires','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Questionnaires','url'=>array('admin')),
);
?>

<h1>View Questionnaires #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'status',
	),
)); ?>
