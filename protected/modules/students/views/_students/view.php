<?php
$this->breadcrumbs=array(
	'Students'=>array('index'),
	$model->identification,
);

$this->menu=array(
	array('label'=>'List Students','url'=>array('index')),
	array('label'=>'Create Students','url'=>array('create')),
	array('label'=>'Update Students','url'=>array('update','id'=>$model->identification)),
	array('label'=>'Delete Students','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->identification),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Students','url'=>array('admin')),
);
?>

<h1>View Students #<?php echo $model->identification; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'identification',
		'firstname',
		'secondname',
		'lastname1',
		'lastname2',
		'tel_local',
		'tel_mobil',
		'email',
		'date_of_birth',
		'user_college',
		'pass_college',
		'address',
		'status',
		'user_id',
		'parents_id',
	),
)); ?>
