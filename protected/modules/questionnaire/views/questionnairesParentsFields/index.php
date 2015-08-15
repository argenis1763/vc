<?php
$this->breadcrumbs=array(
	'Cuestionario para padres',
);

$this->menu=array(
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/plus27.png") .'Crear Cuestiorio','url'=>array('create')),
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/cogs3.png") .'Gestionar Cuestionarios','url'=>array('admin')),
);
?>
<legend>Lista de cuestionarios para padres y prepresentantes</legend>
<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
