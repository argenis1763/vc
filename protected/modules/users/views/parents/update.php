<?php
/* @var $this ParentsController */
/* @var $model Parents */
?>

<?php
$this->breadcrumbs=array(
	'Parents'=>array('index'),
	$model->id_parent=>array('view','id'=>$model->id_parent),
	'Update',
);

$this->menu=array(
	array('label'=>'List Parents', 'url'=>array('index')),
	array('label'=>'Create Parents', 'url'=>array('create')),
	array('label'=>'View Parents', 'url'=>array('view', 'id'=>$model->id_parent)),
	array('label'=>'Manage Parents', 'url'=>array('admin')),
);
?>

    <h1>Update Parents <?php echo $model->id_parent; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>