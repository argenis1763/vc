<?php
$this->breadcrumbs=array(
	'Students',
);

$this->menu=array(
	array('label'=>'Create Students','url'=>array('create')),
	array('label'=>'Manage Students','url'=>array('admin')),
);
?>

<h1>Students</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
