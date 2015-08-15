<?php
$this->breadcrumbs=array(
	'Students'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Students','url'=>array('index')),
	array('label'=>'Create Students','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('students-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<legend>Administración de Estudiantes</legend>

<div class="well"><p>
Opcionalmente puedes usar los filtros al inicio de cada valor de búsqueda, y las opciones de paginación que se encuentran al <br/>final de la tabla.
</p></div>

<?php $this->widget('application.extensions.tablesorter.Sorter',array(
	/*'id'=>'students-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,*/
        'data'=>$model,
	'columns'=>array(
		'identification',
		'firstname',
		'secondname',
		'lastname1',
		'lastname2',
		'tel_local',
		/*
		'tel_mobil',
		'email',
		'date_of_birth',
		'user_college',
		'pass_college',
		'address',
		'status',
		'user_id',
		'parents_identification',
		
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
