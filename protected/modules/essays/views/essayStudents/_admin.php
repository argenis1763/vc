<!-- Estudiante del Tutor -->
<?php $this->beginWidget('yiiwheels.widgets.box.WhBox', array(
    'title' => 'Estudiantes sin Tutor',
    'headerIcon' => 'icon-th-list',
    /*'headerButtons' => array(
            TbHtml::buttonGroup(
                array(
                    array(
                        'label' => 'Asignar Essay a estudiante', 
                        'onclick' => '$("#myModal").dialog("open"); return false;'),                 
                )
            ),
        ),*/
    //'content' => displayStudents($model->students),
)); ?>

<?php 
    $this->widget('bootstrap.widgets.TbGridView', array(
	'type' => TbHtml::GRID_TYPE_STRIPED,
	'dataProvider' => $dataStudents,
	'template' => "{summary}{items}{pager}",
	'enablePagination' => true,
	'columns' => array(
            array(
				//'name' => 'id',
				'value' => '$data["id"]',
				'header'=>'ID',
			),
			array(
				'header' => 'Nombre',
				'value' => function($data,$row) {return Profile::model()->nombreApellido($data["firstname"],$data["secondname"],$data["lastname1"],$data["lastname2"]);},
			),
			array(
				'header' => 'Sexo',
				'value' => function($data,$row) {return Profile::model()->validarSexo($data["sex"]);},
				'type' => 'raw',				
			),			
			array(
				'header' => 'Correo',
				'value' => '$data["email"]',
			),	
			array(
				'header' => 'Tutor',
				'value' => function($data,$row) {return Tutor::model()->getNombre($data["tutor_id"]);},
				'type' => 'raw',		
				'visible' => Yii::app()->user->checkAccess('Tutor') && Yii::app()->user->isSuperAdmin,
			),
			array(
				'header' => 'Status',
				'value' => function($data,$row) {return Profile::model()->validarStatus($data["cruge_user_iduser"]);},
				'type' => 'raw',
			),		
			array(
                'name' => '',
                'type' => 'raw',
                'value' => function($data,$row) {return Tutor::model()->botonAsignar($data["tutor_id"],$data["id"]);},
			),
			
         ),
	));
?>

<?php $this->endWidget();?>
<!-- End Box de Estudents sin Essay -->