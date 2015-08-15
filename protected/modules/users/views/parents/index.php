<?php
/* @var $this ParentsController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Parents',
);

$this->menu=array(
	array('label'=>'Create Parents','url'=>array('create')),
	array('label'=>'Manage Parents','url'=>array('admin')),
);
?>

<legend>Padres</legend>

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
				'value' => '$data->id_parent',
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
				'header' => 'Status',
				'type' => 'raw',
				'value'=> function($data,$row) {return Profile::model()->validarStatus($data->profile->cruge_user_iduser);},
			),
			array(
                'header' => '',
                'type' => 'raw',
                'value' => function($data,$row) {return Profile::model()->botonStatus($data->profile->cruge_user_iduser);},
			),			
         ),
));?>