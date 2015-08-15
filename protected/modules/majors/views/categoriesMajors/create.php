<?php
/* @var $this CategoriesMajorsController */
/* @var $model CategoriesMajors */

$this->breadcrumbs=array(
	'Categories Majors'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CategoriesMajors', 'url'=>array('index')),
	array('label'=>'Manage CategoriesMajors', 'url'=>array('admin')),
);
?>

<h1>Create CategoriesMajors</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>