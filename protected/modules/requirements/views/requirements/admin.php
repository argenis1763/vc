<?php
/* @var $this RequirementsController */
/* @var $model Requirements */


$this->breadcrumbs=array(
	'Requisitos'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/list29.png") . ' Listado', 'url'=>array('index')),
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/plus27.png") . ' Crear Requirement', 'url'=>array('create')),
);
?>

<legend>Gestionar Requirements</legend>

<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'requirements-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'create_date',
		'last_update',
		'colleges_id' => array(
                    'name' => 'colleges_id',
                    'value' => '$data->colleges->name',
                    'filter' => CHtml::listData(Colleges::model()->findAll(array('order'=>'name ASC')), 'id','name'),
                ),
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>