<?php
$this->breadcrumbs=array(
	'Questionnaires Students Fields',
);

$this->menu=array(
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/plus27.png") . 'Crear Cuestionario','url'=>array('create')),
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/cogs3.png") . 'Gestionar Cuestionarios','url'=>array('admin')),
        array('label' => 'Volver', 'url' => Yii::app()->getModule('questionnaire')->indexUrl),
);
?>

<legend>Listado de cuestionarios para estudiantes</legend>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
