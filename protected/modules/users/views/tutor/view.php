<?php
/* @var $this TutorController */
/* @var $model Tutor */
?>

<?php
$this->breadcrumbs=array(
	'Tutors'=>array('index'),
	$model->id_tutor,
);

$this->menu=array(
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/list29.png") . 'Listado de Tutores', 'url'=>array('index')),
	//array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/plus27.png") . 'Crear Tutor', 'url'=>array('create')),
	//array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/font2.png") . 'Actualizar Tutor', 'url'=>array('update', 'id'=>$model->id_tutor)),
	//array('label'=>'Delete Tutor', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_tutor),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/cogs3.png") . 'Gestionar Tutores', 'url'=>array('admin')),
);
?>

<legend>Tutor #<?php echo $model->id_tutor; ?></legend>

<section><p><?php echo "<b>Usuario:</b> ".$model->profile->user->username." | ".
						"<b>Registrado:</b> ".Yii::app()->dateFormatter->formatDateTime($model->profile->user->regdate, 'medium', false)." | ".
						"<b>Status:</b> ".Profile::model()->validarStatus($model->profile->cruge_user_iduser); 
			?>
</p></section>

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		array(
			'name' => 'id_tutor',
			'label' => 'ID',
		),	
		array(
			'name' => 'profile.identification',
			'label' => 'Nº Identificación',
		),		
		array(
			'value' => Profile::model()->nombreApellido($model->profile->firstname,$model->profile->secondname,$model->profile->lastname1,$model->profile->lastname2),
			'label' => 'Nombres y Apellidos',
		),
		array(
			'name' => 'profile.email',
			'label' => 'Correo',
		),		
		array(
			'value' => Profile::model()->validarSexo($model->profile->sex) == "M"? "Masculino" : "Femenino",
			'type' => 'raw',
			'label' => 'Sexo',
		),	
		array(
			'name' => 'profile.date_of_birth',
			'value' => Yii::app()->dateFormatter->formatDateTime($model->profile->date_of_birth, 'medium', false),
			'type' => 'raw',
			'label' => 'Fecha de Nacimiento',
		),
		/*
		array(
			'name' => 'profile.user.username',
			'label' => 'Usuario'
		),	
		array(
			'name' => 'profile.user.regdate',
			'value' => Yii::app()->dateFormatter->formatDateTime($model->profile->user->regdate, 'medium', false),
			'type' => 'raw',
			'label' => 'Registrado',
		),		
		array(
			'name' => 'profile.user.state',
			'value' => Profile::model()->validarStatus($model->profile->cruge_user_iduser),
			'type' => 'raw',
			'label' => 'Status'
		),
		*/
	),
)); ?>

<legend>
	<a href="#" id="mostrarAdd" style="display: none;"><i class="fa fa-chevron-down"></i></a>
	<a href="#" id="ocultarAdd"><i class="fa fa-chevron-up"></i></a>
	Asignar Estudiante a Tutor
</legend>
<div id="informacion">
<?php 
	if(Yii::app()->user->hasFlash('save')){ 
		echo TbHtml::alert(TbHtml::ALERT_COLOR_SUCCESS, Yii::app()->user->getFlash('save'));		
	}else if(Yii::app()->user->hasFlash('error')){
		echo TbHtml::alert(TbHtml::ALERT_COLOR_ERROR, Yii::app()->user->getFlash('error'));
	}else if(Yii::app()->user->hasFlash('remove')){	
		echo TbHtml::alert(TbHtml::ALERT_COLOR_SUCCESS, Yii::app()->user->getFlash('remove'));
	}		
	
	$data = Profile::model()->crearArrayStudentsTutor();
	if(empty($data)){
		echo TbHtml::muted('No hay Estudiantes disponibles para asignar,'.TbHtml::b(' ya todos los Estudiantes activos tienen un Tutor asignado.'));
		echo "<br />";
	}else {?>

		<!-- Form asignar Students a Tutor -->
		<?php echo TbHtml::beginFormTb(TbHtml::FORM_LAYOUT_INLINE); ?>
			<fieldset>
				
				<?php
					/*$this->widget('CAutoComplete',
						array(
							'name'=>'studentsEssay',
							'url'=>array('buscarStudents'),
							'extraParams'=>array('id'=>$model->id_tutor),
							'htmlOptions'=>array(
											'size'=>50,
											'maxlength'=>50,
											'span'=>5,
											),
							'methodChain'=>'.result(function(event,item){
													$("#idProfile").val(item[1]);
													$("#cidni").val(item[2]);
													$("#names").val(item[3]);
													$("#lastnames").val(item[4]);
													$("#email").val(item[5]);
											})'
						)
					); */
				?>
				<p>Estudiante:
				<?php					
				$this->widget('yiiwheels.widgets.select2.WhSelect2', array(
				'name' => 'idProfile',
				'asDropDownList' => true,
				'data' => $data,
				'pluginOptions' => array(
					'allowClear' => true,
					'minimumInputLength' => 1,
					'removed' => true,
					'width' => '50%',
				),
				'htmlOptions' => array(
					'prompt' => 'Seleccione un Estudiante...',
				)));
				?>	
				</p>					
				<?php //echo CHtml::hiddenField('idProfile'); ?>
				<?php echo CHtml::hiddenField('idTutor',$model->id_tutor); ?>
				<br />
				<?php echo TbHtml::submitButton('Agregar Estudiante',
				   array('block' => true, 'color' => TbHtml::BUTTON_COLOR_PRIMARY, 'size'=>TbHtml::BUTTON_SIZE_LARGE)); ?>		
				<?php /*echo TbHtml::submitButton('Asignar Estudiante',array(
					'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
					'size'=>TbHtml::BUTTON_SIZE_DEFAULT,
				)); */?>	
							
			</fieldset>
		<?php echo TbHtml::endForm(); ?><!-- form -->
		<hr>
		<!-- Informacionn del Estudiante -->
		<!--C.I./D.N.I: <?php /*echo TbHtml::textField('cidni', '',
							array('readonly'=>'readonly', 'size' => TbHtml::INPUT_SIZE_SMALL)); ?>	
		<br />					
		Nombres:	<?php echo TbHtml::textField('names', '',
							array('readonly'=>'readonly', 'size' => TbHtml::INPUT_SIZE_DEFAULT)); ?>	
		Apellidos:	<?php echo TbHtml::textField('lastnames', '',
							array('readonly'=>'readonly', 'size' => TbHtml::INPUT_SIZE_DEFAULT)); ?>	
		Correo:	-->	<?php echo TbHtml::textField('email', '',
							array('readonly'=>'readonly', 'size' => TbHtml::INPUT_SIZE_DEFAULT)); */?>
		<!-- End Informaci?n del Estudiante -->
	<?php }?>
</div>
	
<!-- Box de Students Asignados -->
<?php $this->beginWidget('yiiwheels.widgets.box.WhBox', array(
    'title' => 'Estudiantes Asignados al Tutor',
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

	$dataProvider=new CActiveDataProvider('Students', array(
    'criteria'=>array(
        //'condition'=>'EXISTS (SELECT * FROM essays_has_cruge_user WHERE students_id = id)',
		'condition'=>'tutor_id = :id',
        'params'=>array(':id'=>$model->id_tutor),
    ),
    ));
    
    $this->widget('yiiwheels.widgets.grid.WhGridView', array(
	'fixedHeader' => true,
	'headerOffset' => 40,
	'type' => 'striped',
	'dataProvider' => $dataProvider,
	'responsiveTable' => true,
	'template' => "{items}",
	'columns' => array(
            'id',
			array(
				'header' => 'Nº de Identidad',
				'value' => '$data->profile->identification',
			),
			array(
				'name' => 'Nombre',
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
                'name' => '',
                'type' => 'raw',
                'value' =>"TbHtml::submitButton('Remover',array(
                        'submit'=>array('remove','id'=>".'$data->id'."),
						'params'=>array('idx'=>$model->id_tutor),
						'confirm'=>'Desea remover al estudiante del Tutor?',
                        'color'=>TbHtml::BUTTON_COLOR_DANGER,
                        'size'=>TbHtml::BUTTON_SIZE_MINI,
                    ))",
			),			
            /*array(
                'name' => '',
                'type' => 'raw',
                'value' => "CHtml::link('Ver / Generar PDF',
                       array('requirements/report/idr/$model->id_essay/ids/$student->id'),
                       array('target'=>'_blank'))",                
                'value' => "CHtml::link('Ver PDF',
                       array('generate/index', array('idr' => '[$model->id]', 'ids' => '[$student->id]')),
                       array('target'=>'_blank'))",*/
            //),
         ),
));?>

<?php $this->endWidget();?>
<!-- End Box de Essays Asignados -->

<script>
$(document).ready(function(){
		
		$("#ocultarAdd").click(function(event){
			event.preventDefault();
			$("#informacion").hide("slow");
			$("#ocultarAdd").hide();
			$("#mostrarAdd").show();
		});

		$("#mostrarAdd").click(function(event){
			event.preventDefault();
			$("#informacion").show("slow");
			$("#mostrarAdd").hide();
			$("#ocultarAdd").show(); 
		});		

});
</script> 