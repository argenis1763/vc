<?php
/* @var $this EssayTypeController */
/* @var $model EssayType */
?>

<?php
$this->breadcrumbs=array(
	'Essay Types'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List EssayType', 'url'=>array('index')),
	array('label'=>'Create EssayType', 'url'=>array('create')),
	array('label'=>'View EssayType', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage EssayType', 'url'=>array('admin')),
);
?>

    <h1>Update EssayType <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>