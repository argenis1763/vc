<?php
/* @var $this StudentsController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Students',
);

$this->menu=array(
	//array('label'=>'Crear Estudiante','url'=>array('create')),
	//array('label'=>'Gestionar Estudiante','url'=>array('admin')),
    array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/cogs3.png") . 'Gestión de Essays','url'=>array('/essays/essays/admin'),'visible' => Yii::app()->user->isSuperAdmin),
);
?>

<legend>Estudiantes</legend>

<?php 
	
    $this->widget('yiiwheels.widgets.grid.WhGridView', array(
	'fixedHeader' => true,
	'headerOffset' => 40,
	'type' => 'striped',
	'dataProvider' => $dataProvider,
	'responsiveTable' => true,
	'template' => "{items}",
	'columns' => array(
            array(
				'header' => 'ID',
				'value' => '$data->id',
			),
			array(
				'header' => 'Nombre',
				'type' => 'raw',
				'value' => function($data,$row) {return Profile::model()->nombreApellido($data->profile->firstname,$data->profile->secondname,$data->profile->lastname1,$data->profile->lastname2);},
			),	
			array(
				'header' => 'Sexo',
				'value' => function($data,$row) {return Profile::model()->validarSexo($data->profile->sex);},
				'type' => 'raw',
			),			
			array(
				'header' => 'Correo',
				'value' => '$data->profile->email',
			),	
			array(
				'header' => 'Tutor',
				'value' => function($data,$row) {return Tutor::model()->getNombre($data->tutor_id);},
				'type' => 'raw',		
				//'visible' => Yii::app()->user->checkAccess('Tutor') && Yii::app()->user->isSuperAdmin,
			),				
			array(
				'header' => 'Status',
				'type' => 'raw',
				'value'=> function($data,$row) {return Profile::model()->validarStatus($data->profile->cruge_user_iduser);},
				//'value' => '$data->profile->user->state'
			),		
			array(
                'header' => '',
                'type' => 'raw',
                'value' => function($data,$row) {return Profile::model()->botonStatus($data->profile->cruge_user_iduser);},
			),	
			array(
                'name' => '',
                'type' => 'raw',
                'value' => function($data,$row) {return Tutor::model()->botonAsignar($data->tutor_id,$data->id);},
			),			
         ),
));?>