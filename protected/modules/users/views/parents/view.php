<?php
/* @var $this ParentsController */
/* @var $model Parents */
?>

<?php
$this->breadcrumbs=array(
	'Parents'=>array('index'),
	$model->id_parent,
);

$this->menu=array(
	array('label'=>'List Parents', 'url'=>array('index')),
	array('label'=>'Create Parents', 'url'=>array('create')),
	array('label'=>'Update Parents', 'url'=>array('update', 'id'=>$model->id_parent)),
	array('label'=>'Delete Parents', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_parent),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Parents', 'url'=>array('admin')),
);
?>

<legend>Padre #<?php echo $model->id_parent; ?></legend>

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
			'name' => 'id_parent',
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
	Asignar Estudiante a Padre
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
	
	$data = Profile::model()->crearArrayStudentsParents();
	if(empty($data)){
		echo TbHtml::muted('No hay Estudiantes disponibles para asignar,'.TbHtml::b(' ya todos los Estudiantes activos tienen un Padre asignado.'));
		echo "<br />";
	}else {?>

		<!-- Form asignar Students a Tutor -->
		<?php echo TbHtml::beginFormTb(TbHtml::FORM_LAYOUT_INLINE); ?>
			<fieldset>

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
				<?php echo CHtml::hiddenField('idParent',$model->id_parent); ?>
				<br />
				<?php echo TbHtml::submitButton('Agregar Estudiante',
				   array('block' => true, 'color' => TbHtml::BUTTON_COLOR_PRIMARY, 'size'=>TbHtml::BUTTON_SIZE_LARGE)); ?>			
							
			</fieldset>
		<?php echo TbHtml::endForm(); ?><!-- form -->
		<hr>
	<?php }?>
</div>
	
<!-- Box de Students Asignados -->
<?php $this->beginWidget('yiiwheels.widgets.box.WhBox', array(
    'title' => 'Estudiantes Asignados al Padre',
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
		'condition'=>'parents_id = :id',
        'params'=>array(':id'=>$model->id_parent),
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
						'params'=>array('idx'=>$model->id_parent),
						'confirm'=>'Desea remover al estudiante del Padre?',
                        'color'=>TbHtml::BUTTON_COLOR_DANGER,
                        'size'=>TbHtml::BUTTON_SIZE_MINI,
                    ))",
			),
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