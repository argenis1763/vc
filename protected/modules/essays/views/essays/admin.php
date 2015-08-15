<?php
/* @var $this EssaysController */
/* @var $model Essays */


$this->breadcrumbs=array(
	'Essays'=>array('index'),
	'Gestionar',
);

$this->menu=array(
	//array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/list29.png") . 'Listado de Essays', 'url'=>array('index')),
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/plus27.png") . 'Crear Essay', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#essays-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<legend>Gestión de Essays</legend>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'essays-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_essays',
		'colleges_has_majors_colleges_id' => array(
			'name'=>'colleges_has_majors_colleges_id',
			'value' => function($data,$row) use ($model){return $model->getNameCollegeEssay($data->colleges_has_majors_colleges_id);},
			'filter' => CHtml::listData($model->getListCollegeEssay(), 'id','name'),
		),
		'colleges_has_majors_majors_id' => array(
			'name' => 'colleges_has_majors_majors_id',
			'value' => function($data,$row) use ($model){return $model->getNameMajorEssay($data->colleges_has_majors_majors_id);},
			'filter' => CHtml::listData($model->getListMajorEssay(), 'id','name'),
		),
		'type_essay_id' => array(
			'name' => 'type_essay_id',
			'value' => '$data->typeEssay->name',
			'filter' => CHtml::listData($model->getListTypeEssay(), 'id','name'),
		),
		'title',
		/*'file_name',
		'regdate',
		'update',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>