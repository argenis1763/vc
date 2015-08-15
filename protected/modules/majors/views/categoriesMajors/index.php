<?php
/* @var $this CategoriesMajorsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Categories Majors',
);

$this->menu=array(
	array('label'=>'Create CategoriesMajors', 'url'=>array('create')),
	array('label'=>'Manage CategoriesMajors', 'url'=>array('admin')),
);
?>

<h1>Categories Majors</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
