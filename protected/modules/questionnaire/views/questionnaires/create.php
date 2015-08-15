<?php
$this->breadcrumbs=array(
	'Questionnaires'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Questionnaires','url'=>array('index')),
	array('label'=>'Manage Questionnaires','url'=>array('admin')),
);
?>

<h1>Create Questionnaires</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>