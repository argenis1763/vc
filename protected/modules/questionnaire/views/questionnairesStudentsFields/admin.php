<?php
$this->breadcrumbs=array(
	'Questionnaires Students Fields'=>array('index'),
	'Manage',
);

$this->menu = array(
    array('label' => CHtml::image(Yii::app()->theme->baseUrl . "/img/operaciones/list29.png") . 'Listado', 'url' => array('index')),
    array('label' => CHtml::image(Yii::app()->theme->baseUrl . "/img/operaciones/plus27.png") . 'Crear Cuestionario', 'url' => array('create')),
    array('label' => 'Volver', 'url' => Yii::app()->getModule('questionnaire')->indexUrl),
);

?>

<legend>Gestión de cuestionarios para estudiantes</legend>

<?php $this->widget('application.extensions.tablesorter.Sorter',array(
	/*'id'=>'questionnaires-students-fields-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,*/
        'data'=>$model,
	'columns'=>array(
		'id',
		'est1',
		'est2',
		'est3',
		'est4',
		'est5',
		/*
		'est6',
		'est7',
		'est8',
		'questionnaires_id',
		
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),*/
	),
        'filters'=>array(
            '',
            '',
            '',
            '',
            '',//'filter-false',  won't filter this
            '',// filter as select box
        ),
)); ?>
