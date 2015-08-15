<?php
/* @var $this CategoriesMajorsController */
/* @var $model CategoriesMajors */

$this->breadcrumbs=array(
	'Categories Majors'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CategoriesMajors', 'url'=>array('index')),
	array('label'=>'Create CategoriesMajors', 'url'=>array('create')),
	array('label'=>'View CategoriesMajors', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CategoriesMajors', 'url'=>array('admin')),
);
?>

<h1>Update CategoriesMajors <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>