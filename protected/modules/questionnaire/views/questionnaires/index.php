<?php
$this->breadcrumbs=array(
	'Questionnaires',
);

$this->menu=array(
	array('label'=>'Antecedentes de Salud', 'url' => Yii::app()->getModule('questionnaire')->medicalAdminUrl),
	array('label'=>'Padres', 'url' => Yii::app()->getModule('questionnaire')->parentsAdminUrl),
        array('label'=>'Estudiantes', 'url' => Yii::app()->getModule('questionnaire')->studentsAdminUrl),
);
?>

<legend>Cuestionarios</legend>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
