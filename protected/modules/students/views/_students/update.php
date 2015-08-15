<?php
$this->breadcrumbs=array(
	'Students'=>array('index'),
	$model->identification=>array('view','id'=>$model->identification),
	'Update',
);

$this->menu=array(
	array('label'=>'List Students','url'=>array('index')),
	array('label'=>'Create Students','url'=>array('create')),
	array('label'=>'View Students','url'=>array('view','id'=>$model->identification)),
	array('label'=>'Manage Students','url'=>array('admin')),
);
?>

<h1>Update Students <?php echo $model->identification; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>