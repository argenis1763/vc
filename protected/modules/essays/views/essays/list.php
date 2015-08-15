<?php
/* @var $this EssaysController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Essays',
);

$this->menu=array(
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/group.png") . 'Mis Estudiantes','url'=>array('list')),
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/speech59.png") . 'Chat','url'=>'#'),
);
?>

<legend>Seguimiento de estudiantes</legend>

<!-- Estudiante del Tutor -->
<?php $this->beginWidget('yiiwheels.widgets.box.WhBox', array(
    'title' => 'Estudiantes sin Essay',
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
	
    $this->widget('yiiwheels.widgets.grid.WhGridView', array(
	'fixedHeader' => true,
	'headerOffset' => 40,
	'type' => 'striped',
	'dataProvider' => $dataStudents,
	'responsiveTable' => true,
	'template' => "{items}",
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
                'value' => function($data,$row) {return Tutor::model()->botonAsignar($data["tutor_id"]);},
			),
			
         ),
));?>

<?php $this->endWidget();?>
<!-- End Box de Estudents sin Essay -->

<!-- Estudiante del Tutor -->
<?php $this->beginWidget('yiiwheels.widgets.box.WhBox', array(
    'title' => 'Estudiantes con Essay',
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
	
    $this->widget('yiiwheels.widgets.grid.WhGridView', array(
	'fixedHeader' => true,
	'headerOffset' => 40,
	'type' => 'striped',
	'dataProvider' => $dataStudentEssay,
	'responsiveTable' => true,
	'template' => "{items}",
	'columns' => array(
            array(
				'name' => 'ID',
				'value' => '$data->id_essay_cruge',
			),
			array(
				'name' => 'Nombre',
				'type' => 'raw',
				'value' => function($data,$row) {return Profile::model()->nombreApellido($data->students->profile->firstname,$data->students->profile->secondname,$data->students->profile->lastname1,$data->students->profile->lastname2);},
			),			
			/*array(
				'name' => 'Correo',
				'value' => '$data->students->profile->email',
			),*/	
			array(
				'name' => 'Essay',
				'name' => 'Titulo',
				'value' => '$data->title_essay',
			),	
			array(
				'name' => 'Tipo',
				'value' => '$data->essays->typeEssay->short_name',
			),
			array(
				'name' => 'Inicio',
				'type' => 'datetime',
				'value' => '$data->stardate',
			),			
			array(
				'name' => 'Entrega',
				'type' => 'datetime',
				'value' => '$data->enddate',
			),			
			array(
				'name' => 'Status',
				'type' => 'raw',
				'value'=> function($data,$row) {return EssaysHasCrugeUser::model()->validarStatus($data->status);},
			),			
			/*array(
				'name' => 'Tipo de Essay',
				'value' => function($data,$row) use ($essay){return $essay->getNameCollegeEssay($data->essays->colleges_has_majors_colleges_id);},
			),				
			array(
				'name' => 'Colleges',
				'value' => function($data,$row) use ($essay){return $essay->getNameCollegeEssay($data->essays->colleges_has_majors_colleges_id);},
			),
			array(
				'name' => 'Majors',
				'value' => function($data,$row) use ($essay){return $essay->getNameMajorEssay($data->essays->colleges_has_majors_majors_id);},
			),		
			array(
				'name' => 'Título de Essay',
				'value' => '$data->title_essay',
			),
			array(
				'name'=>'Fecha de Inicio',
				'value' => '$data->stardate',
				'type'=>'datetime',
			),
			array(
				'name'=>'Status',
				'value' => '$data->status',
			),*/
           /* array(
                'name' => '',
                'type' => 'raw',
                'value' => "CHtml::link('Ver / Generar PDF',
                       array('essaystudents/write/id/4'))",  
            ),	*/		
			array(
                'name' => '',
                'type' => 'raw',
                'value' =>"TbHtml::submitButton('Essay',array(
                        'submit'=>array('essayStudents/write','id'=>".'$data->id_essay_cruge'."),
                        'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
                        'size'=>TbHtml::BUTTON_SIZE_MINI,
                    ))",
			),			

         ),
));?>

<?php $this->endWidget();?>
<!-- End Box de Estudents con Essay -->

<?php $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
     'id'=>'myModal',
     'options'=>array(
         'title'=>'Asignar Tutor a Estudiante',
         'autoOpen'=>false,
         'modal'=>true,
         'width'=>400,
         'height'=>430,
         'resizable'=>false,
     ),
   ));
    //$student = new Students;
    //echo $this->renderPartial('_student', array('model'=>$model, 'student'=>$student));
?>
<?php $this->endWidget('zii.widgets.jui.CJuiDialog'); ?>