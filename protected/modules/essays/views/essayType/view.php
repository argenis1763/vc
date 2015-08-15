<?php
/* @var $this EssayTypeController */
/* @var $model EssayType */
?>

<?php
$this->breadcrumbs=array(
	'Essay Types'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List EssayType', 'url'=>array('index')),
	array('label'=>'Create EssayType', 'url'=>array('create')),
	array('label'=>'Update EssayType', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete EssayType', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EssayType', 'url'=>array('admin')),
);
?>

<h1>View EssayType #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'name',
		'short_name',
	),
)); ?>