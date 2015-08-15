<?php
$this->breadcrumbs=array(
	'Colleges'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/list29.png") . 'Listado de Colleges','url'=>array('index')),
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/plus27.png") . 'Crear College','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('colleges-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<legend>Administración de Colleges</legend>

<?php $this->widget('application.extensions.tablesorter.Sorter',array(
	/*'id'=>'colleges-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,*/
        'data'=>$model,
	'columns'=>array(
		'id',
		'name',
                'stateIdState.name'
                /*'state_id_state'=>array(
                    'name'=>'state_id_state',
                    'value'=>'$data->stateIdState->name',
                    'filter'=>CHtml::listData(State::model()->findAll(array('order'=>'name ASC')), 'id_state','name'),
                ),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),*/
	),
        'filters'=>array(
            '',
            'filter-select',//'filter-false',  won't filter this
            'filter-select',// filter as select box
        ),     
)); ?>
