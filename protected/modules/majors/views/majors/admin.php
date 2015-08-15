<?php
$this->breadcrumbs=array(
	'Majors'=>array('index'),
	'Gestionar',
);

$this->menu=array(
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/list29.png") . 'Listado de Majors','url'=>array('index')),
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/plus27.png") . 'Crear Major','url'=>array('create')),
);

?>

<legend>Administración de Majors</legend>

<?php $this->widget('application.extensions.tablesorter.Sorter',array(
	//'id'=>'majors-grid',
	//'dataProvider'=>$model->search(),
	//'filter'=>$model,
        'data'=>$model,
	'columns'=>array(
		'id',
		'name',
		//'description',
                'categoriesMajors.name',
		/*'categories_majors_id'=>array(
                    'name'=>'categories_majors_id',
                    'value'=>'$data->categoriesMajors->name',
                    'filter'=>CHtml::listData(CategoriesMajors::model()->findAll(array('order'=>'name ASC')), 'id','name'),
                ),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),*/
	),
        'filters'=>array(
            '',
            '',//'filter-false',  won't filter this
            'filter-select',
        ),    
)); ?>
