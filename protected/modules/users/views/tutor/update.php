<?php
/* @var $this TutorController */
/* @var $model Tutor */
?>

<?php
$this->breadcrumbs=array(
	'Tutors'=>array('index'),
	$model->id_tutor=>array('view','id'=>$model->id_tutor),
	'Update',
);

$this->menu=array(
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/list29.png") . 'Listado de Tutores', 'url'=>array('index')),
	//array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/plus27.png") . 'Crear Tutor', 'url'=>array('create')),
	//array('label'=>'View Tutor', 'url'=>array('view', 'id'=>$model->id_tutor)),
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/cogs3.png") . 'Gestionar Tutores', 'url'=>array('admin')),
);
?>

<legend>Actualizar Tutor # <?php echo $model->id_tutor; ?></legend>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>