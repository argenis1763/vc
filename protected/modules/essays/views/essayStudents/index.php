<?php
/* @var $this EssaysController */
/* @var $dataProvider CActiveDataProvider */
?>
<?php 
	if(Yii::app()->user->checkAccess('Aliado') || Yii::app()->user->checkAccess('College') || Yii::app()->user->isSuperAdmin){
		$sql='SELECT id, firstname, secondname, lastname1, lastname2, sex,  `profile`.email, tutor_id, cruge_user_iduser,  `cruge_user`.state
				FROM  `students` 
				INNER JOIN (
				`profile` 
				INNER JOIN  `cruge_user` ON cruge_user_iduser = iduser
				AND  `cruge_user`.state =1
				) ON `students`.tutor_id IS NULL AND `students`.profile_id = `profile`.id_profile';
					
		$count = Yii::app()->db->createCommand('SELECT COUNT(*)
												FROM  `students` 
												INNER JOIN (
												`profile` 
												INNER JOIN  `cruge_user` ON cruge_user_iduser = iduser
												AND  `cruge_user`.state =1
												) ON `students`.tutor_id IS NULL AND`students`.profile_id = `profile`.id_profile')->queryScalar();	

		$dataStudents =  new CSqlDataProvider($sql,array(
				'totalItemCount' => $count,

				'sort' => array(
					'defaultOrder' => array(
						'id' => CSort::SORT_ASC, //default sort value
					),
					'attributes'=>array(
						 'id', 'firstname', 'secondname', 'lastname1', 'lastname2', 'sex', 'email', 'tutor_id', 'cruge_user_iduser', 'state'
					),						
				),
				'pagination' => array(
					'pageSize' => 10,
				),			
		));
	}	
?>
<?php
$this->breadcrumbs=array(
	'Essays',
);

$this->menu=array(
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/group.png") . 'Mis Estudiantes','url'=>array('/users/students/index'),'visible' => Yii::app()->user->checkAccess('College') || Yii::app()->user->checkAccess('Tutor') || Yii::app()->user->isSuperAdmin),
        array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/group.png") . 'Seguimiento','url'=>array('index'),'visible' => Yii::app()->user->isSuperAdmin),
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/list29.png") . 'Mis Essays','url'=>array('index'),'visible' => Yii::app()->user->checkAccess('Estudiante') && !Yii::app()->user->isSuperAdmin),
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/cogs3.png") . 'Gestión de Essays','url'=>array('/essays/essays/admin'),'visible' => Yii::app()->user->checkAccess('Tutor') || Yii::app()->user->isSuperAdmin),
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/user.png") . 'Perfil','url'=>'#','visible' => Yii::app()->user->checkAccess('Estudiante') && !Yii::app()->user->isSuperAdmin)	
);
?>

<legend>Essays</legend>

<?php 
	if(Yii::app()->user->checkAccess('Aliado') || Yii::app()->user->checkAccess('College') || Yii::app()->user->isSuperAdmin){
		$this->renderPartial('_admin', array('dataStudents'=>$dataStudents)); 
	}
?>

<!-- Estudiante del Tutor -->
<?php 
	if(Yii::app()->user->checkAccess('Tutor') || Yii::app()->user->checkAccess('College') || Yii::app()->user->isSuperAdmin){
		$name = "Estudiantes con Essays";
	}else if(Yii::app()->user->checkAccess('Estudiante') && !Yii::app()->user->isSuperAdmin){
		$name = "Mis Essays";
	}
	
	$this->beginWidget('yiiwheels.widgets.box.WhBox', array(
    'title' => $name,
    'headerIcon' => 'icon-th-list',
    /*'headerButtons' => array(
            TbHtml::buttonGroup(
                array(
                    array(
                        'label' => 'Asignar Essay a estudiante', 
                        'onclick' => '$("#myModal").dialog("open"); return false;'),                 
                )
            ),*/   
    //'content' => displayStudents($model->students),
)); ?>

<?php 
	
    $this->widget('bootstrap.widgets.TbGridView', array(
	'type' => TbHtml::GRID_TYPE_STRIPED,
	'dataProvider' => $dataStudentEssay,
	'template' => "{summary}{items}{pager}",
	'enablePagination' => true,
	'columns' => array(
            array(
				'name' => 'ID',
				'value' => '$data->id_essay_cruge',
			),
			array(
				'name' => 'Nombre',
				'type' => 'raw',
				'value' => function($data,$row) {return Profile::model()->nombreApellido($data->students->profile->firstname,$data->students->profile->secondname,$data->students->profile->lastname1,$data->students->profile->lastname2);},
				'visible' => Yii::app()->user->checkAccess('College') || Yii::app()->user->checkAccess('Tutor') || Yii::app()->user->isSuperAdmin
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
			/*array(
                'name' => '',
                'type' => 'raw',
                'value' =>"TbHtml::submitButton('Essay',array(
                        'submit'=>array('write','id'=>".'$data->id_essay_cruge'."),
                        'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
                        'size'=>TbHtml::BUTTON_SIZE_MINI,
                    ))",
			),*/		
			array(
				'name' => '',
				'type' => 'raw',
				'value'=> function($data,$row) {return EssaysHasCrugeUser::model()->getButtonEssay($data->id_essay_cruge);},
				'htmlOptions'=>array('width'=>'20'),
			),			

         ),
));?>

<?php $this->endWidget();?>
<!-- End Box de Estudents con Essay -->
