<?php
/* @var $this RequirementsController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Requisitos',
);

$this->menu=array(
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/plus27.png") . ' Crear Requirement', 'url'=>array('create')),
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/cogs3.png") . 'Gestionar Requirements', 'url'=>array('admin')),
);
?>

<legend>Requirements Generados</legend>

<?php /*$this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); */?>
<?php $this->widget('yiiwheels.widgets.grid.WhGridView', array(
	'fixedHeader' => true,
	'headerOffset' => 40,
	'type' => 'striped',
	'dataProvider' => $dataProvider,
	'responsiveTable' => true,
	'template' => "{items}",
	'columns' => array(
		array(
			'header' => 'ID',
			'value' => '$data->id'
		),
		array(
			'header' => 'Fecha de creación',
			'value' => '$data->create_date',
		),
		array(
			'header' => 'Ultima actualización',
			'value' => '$data->last_update',
		),
		array(
			'header' => 'Colleges',
			'value' => '$data->colleges->name',
		),
	),
));?>