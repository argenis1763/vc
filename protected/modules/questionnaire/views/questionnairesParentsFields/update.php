<?php
$this->breadcrumbs=array(
	'Questionnaires Parents Fields'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/list29.png") . 'Listado','url'=>array('index')),
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/plus27.png") . 'Crear Cuestionario','url'=>array('create')),
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/font2.png") . 'Ver Detalle','url'=>array('view','id'=>$model->id)),
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/cogs3.png") . 'Gestionar Cuestionarios','url'=>array('admin')),
);
?>

<legend>Actualizar cuestionario para padres y representantes <?php echo $model->id; ?></legend>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>