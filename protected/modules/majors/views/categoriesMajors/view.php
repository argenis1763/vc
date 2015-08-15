<?php
/* @var $this CategoriesMajorsController */
/* @var $model CategoriesMajors */

$this->breadcrumbs=array(
	'Categories Majors'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List CategoriesMajors', 'url'=>array('index')),
	array('label'=>'Create CategoriesMajors', 'url'=>array('create')),
	array('label'=>'Update CategoriesMajors', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CategoriesMajors', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CategoriesMajors', 'url'=>array('admin')),
);
?>

<h1>View CategoriesMajors #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
	),
)); ?>
