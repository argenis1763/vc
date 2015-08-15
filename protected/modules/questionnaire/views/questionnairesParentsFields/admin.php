<?php
$this->breadcrumbs=array(
	'Questionnaires Parents Fields'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=> CHtml::image(Yii::app()->theme->baseUrl . "/img/operaciones/list29.png") . 'Listado','url'=>array('index')),
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl . "/img/operaciones/plus27.png") .'Create Cuestionario','url'=>array('create')),
        array('label' => 'Volver', 'url' => Yii::app()->getModule('questionnaire')->indexUrl),
);

?>

<legend>Gestión de cuestionarios para padres y representantes</legend>

<?php $this->widget('application.extensions.tablesorter.Sorter',array(
	/*'id'=>'questionnaires-parents-fields-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,*/
        'data'=>$model,
	'columns'=>array(
		'id',
		'pad1',
		'pad2',
		'pad3',
		'pad4',
		'pad5',
		/*
		'pad6',
		'pad7',
		'pad8',
		'pad9',
		'pad10',
		'pad11',
		'pad12',
		'pad13',
		'pad14',
		'pad15',
		'pad16',
		'pad17',
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
