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

<legend>Gestionar Usuarios</legend>

<!-- Box de Students VC -->
<?php $this->beginWidget('yiiwheels.widgets.box.WhBox', array(
    'title' => 'Estudiantes VC',
    'headerIcon' => 'icon-th-list',
    'headerButtons' => array(
            TbHtml::buttonGroup(
                array(
                    array(
                        'label' => 'Gestionar Estudiante', 
						'submit' => array('students/admin'),
					),
                )
            ),
        ),
    //'content' => displayStudents($model->students),
)); ?>

<?php 
	
    $this->widget('yiiwheels.widgets.grid.WhGridView', array(
	'fixedHeader' => true,
	'headerOffset' => 40,
	'type' => 'striped',
	'dataProvider' => $dataStudents,
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
				'header' => 'Registrado',
				//'value' => '$data->profile->user->regdate',
				'value' => function($data,$row) {return Yii::app()->dateFormatter->formatDateTime($data->profile->user->regdate, 'medium', false);},
				'type' => 'raw',
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
			array(
                'name' => '',
                'type' => 'raw',
                'value' => function($data,$row) {return Tutor::model()->botonAsignar($data->tutor_id,$data->id);},
			),			
         ),
));?>
<?php $this->endWidget();?>
<!-- End Box de Estudiantes VC -->

<!-- Box de Tutors VC -->
<?php $this->beginWidget('yiiwheels.widgets.box.WhBox', array(
    'title' => 'Tutores VC',
    'headerIcon' => 'icon-th-list',
    'headerButtons' => array(
            TbHtml::buttonGroup(
                array(
                    array(
                        'label' => 'Gestionar Tutor', 
						'submit' => array('tutor/admin'),
					),
                )
            ),
        ),
    //'content' => displayStudents($model->students),
)); ?>

<?php 
	
    $this->widget('yiiwheels.widgets.grid.WhGridView', array(
	'fixedHeader' => true,
	'headerOffset' => 40,
	'type' => 'striped',
	'dataProvider' => $dataTutor,
	'responsiveTable' => true,
	'template' => "{items}",
	'columns' => array(
            array(
				'header' => 'ID',
				'value' => '$data->id_tutor',
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
				'header' => 'Registrado',
				'value' => function($data,$row) {return Yii::app()->dateFormatter->formatDateTime($data->profile->user->regdate, 'medium', false);},
				'type' => 'raw',
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
<?php $this->endWidget();?>
<!-- End Box de Tutors VC -->

<!-- Box de Parents VC -->
<?php $this->beginWidget('yiiwheels.widgets.box.WhBox', array(
    'title' => 'Padres VC',
    'headerIcon' => 'icon-th-list',
    'headerButtons' => array(
            TbHtml::buttonGroup(
                array(
                    array(
                        'label' => 'Gestionar Padres', 
						'submit' => array('parents/admin'),
					),
                )
            ),
        ),
    //'content' => displayStudents($model->students),
)); ?>
<?php 
	
    $this->widget('yiiwheels.widgets.grid.WhGridView', array(
	'fixedHeader' => true,
	'headerOffset' => 40,
	'type' => 'striped',
	'dataProvider' => $dataParents,
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
				'header' => 'Registrado',
				'value' => function($data,$row) {return Yii::app()->dateFormatter->formatDateTime($data->profile->user->regdate, 'medium', false);},
				'type' => 'raw',
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
<?php $this->endWidget();?>
<!-- End Box de Parents VC -->