<?php
$this->breadcrumbs=array(
	'Questionnaires'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Questionnaires','url'=>array('index')),
	array('label'=>'Create Questionnaires','url'=>array('create')),
	array('label'=>'View Questionnaires','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage Questionnaires','url'=>array('admin')),
);
?>

<h1>Update Questionnaires <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>