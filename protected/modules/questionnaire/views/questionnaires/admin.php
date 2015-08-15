<?php
$this->breadcrumbs=array(
	'Questionnaires'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Questionnaires','url'=>array('index')),
	array('label'=>'Create Questionnaires','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('questionnaires-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<legend>Manage Questionnaires</legend>

<div class="well"><p>
Opcionalmente puedes usar los filtros al inicio de cada valor de búsqueda, y las opciones de paginación que se encuentran<br/> al final de la tabla.
</p></div>

<?php $this->widget('application.extensions.tablesorter.Sorter',array(
	/*'id'=>'questionnaires-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,*/
        'data'=>$model,
	'columns'=>array(
		'id',
		'name',
		'status',
		/*array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),*/
	),
        'filters'=>array(
            '',
            '',
            '',
        ),    
)); ?>
