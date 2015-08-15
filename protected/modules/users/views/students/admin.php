<?php
/* @var $this StudentsController */
/* @var $model Students */


$this->breadcrumbs=array(
	'Students'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/list29.png") . 'Listado de Estudiantes', 'url'=>array('index')),
	//array('label'=>'Create Students', 'url'=>array('create')),
);

?>

<legend>Gestionar Estudiantes</legend>

<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'students-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		array(
			'name' => 'identification',
			'value' => '$data->profile->identification',
			'header'=> 'C.I./D.N.I',
			//'filter'=> CHtml::activeTextField(Profile::model(), 'firstname'),
		),		
		array(
			'name' => 'firstname',
			'value' => '$data->profile->firstname',
			'header'=> '1º Nombre',
			//'filter'=> CHtml::activeTextField(Profile::model(), 'firstname'),
		),	
		array(
			'name' => 'secondname',
			'value' => '$data->profile->secondname',
			'header'=> '2º Nombre',
			//'filter'=> CHtml::activeTextField(Profile::model(), 'firstname'),
		),
		array(
			'name' => 'lastname1',
			'value' => '$data->profile->lastname1',
			'header'=> '1º Apellido',
			//'filter'=> CHtml::activeTextField(Profile::model(), 'firstname'),
		),
		array(
			'name' => 'lastname2',
			'value' => '$data->profile->lastname2',
			'header'=> '2º Apellido',
			//'filter'=> CHtml::activeTextField(Profile::model(), 'firstname'),
		),	
		array(
			'name' => 'profile.user.state',
			'value' => function($data,$row) {return Profile::model()->validarStatus($data->profile->cruge_user_iduser);},
			'header' => 'Status',
			//'filter'=> Profile::model()->getStatus(),
			'type' => 'raw',
		),
		/*
		'profile_id',
		'user_college',
		'pass_college',
		'requirements_id',
		'parents_id',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>