<?php
$this->breadcrumbs=array(
	'Cuestionario de ficha médica',
);

$this->menu=array(
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/plus27.png") . 'Crear Cuestionario','url'=>array('create')),
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/cogs3.png") . 'Gestionar Cuestionarios','url'=>array('admin')),
        array('label' => 'Volver', 'url' => Yii::app()->getModule('questionnaire')->indexUrl),
);
?>

<legend>Cuestionarios para antecedentes de salud </legend>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
