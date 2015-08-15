<?php
/* @var $this RequirementsController */
/* @var $model Requirements */
?>
<?php
function displayRequiremenstField($requirementsHasRequirementsFields) { 
	$output = "<ul>\n";
            foreach($requirementsHasRequirementsFields as $requirementsHasRequirementsField) {
                    //$output .= CHtml::tag('li',array(),CHtml::link("{$requirementsHasRequirementsField->requirementsFields->name}",array('show','id'=>$requirementsHasRequirementsField->requirementsFields->id)));
                    $output .= CHtml::tag('li',array(),$requirementsHasRequirementsField->requirementsFields->name);
                    /*$output .= TbHtml::submitButton('Eliminar',array(
                        //'submit'=>array('delete','id'=>$requirimentsHasRequirimentsField->requirimentsFields->id),
                        'submit'=>array('index'),
                        'color'=>TbHtml::BUTTON_COLOR_DANGER,
                        'size'=>TbHtml::BUTTON_SIZE_MINI,
                    ));*/
            }
	$output .= "</ul>\n";
	return $output;
}

function displayStudents($students) {        
	//$output = "<ul>\n";
          $output = "<table>"
                    . "<thead>"
                        . "<tr>"
                            . "<td>Nombre</td><td>Apellido</td><td>Email</td>"
                        . "</tr>"
                    . "</thead>"
                    . "<tbody>";
                    
            foreach($students as $student) {
                    $output .= "<tr>"
                                . "<td>".$student->firstname."</td>" . "<td>".$student->lastname1."</td>" . "<td>".$student->email."</td>"
                            . "</tr>";
                    //$output .= CHtml::tag('li',array(),CHtml::link("{$requirementsHasRequirementsField->requirementsFields->name}",array('show','id'=>$requirementsHasRequirementsField->requirementsFields->id)));
                    //$output .= CHtml::tag('li',array(),$student->firstname ." ".$student->lastname1);
                    /*$output .= TbHtml::submitButton('Eliminar',array(
                        //'submit'=>array('delete','id'=>$requirimentsHasRequirimentsField->requirimentsFields->id),
                        'submit'=>array('index'),
                        'color'=>TbHtml::BUTTON_COLOR_DANGER,
                        'size'=>TbHtml::BUTTON_SIZE_MINI,
                    ));*/
            }
          $output .= "</tbody>"
                  . "</table>";
	//$output .=  "</ul>\n";
	return $output;
}
?>

<?php
$this->breadcrumbs=array(
	'Requirement'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/list29.png") . ' Listado', 'url'=>array('index')),
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/plus27.png") . ' Crear Requirement', 'url'=>array('create')),
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/font2.png") . ' Editar Requirement', 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/trash29.png") . ' Eliminar Requirement', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/cogs3.png") . ' Gestionar Requirements', 'url'=>array('admin')),
);
?>

<legend>Detalle de Requirement #<?php echo $model->id; ?></legend>
<!-- Box de Students Asignados -->
<?php $this->beginWidget('yiiwheels.widgets.box.WhBox', array(
    'title' => 'Información del Requirement',
    'headerIcon' => 'icon-th-list',
    'headerButtons' => array(
            TbHtml::buttonGroup(
                array(
                    array(
                        'label' => 'Actualizar campos del Requirement', 
                        //'onclick' => '$("#myModal").dialog("open"); return false;'),    
						'submit' => array('load','id'=>$model->id),	
					),			
                )
            ),
        ),
    //'content' => displayStudents($model->students),
)); ?>
<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$model,
    'attributes'=>array(
		'id',
		'create_date',
		'last_update',
		'colleges.name',
		array(               // related services
			'label'=>'Campos del Requirement',
			'type'=>'raw',
			'value'=>displayRequiremenstField($model->requirementsHasRequirementsFields),
        ),          
	),
)); ?>
<?php $this->endWidget();?>

<?php /*echo TbHtml::button('Actualizar campos del Requirement', array(
    'color' => TbHtml::BUTTON_COLOR_PRIMARY,
    'submit' => array('load','id'=>$model->id)
    )); */
?>

<legend>
	<a href="#" id="mostrarAdd" style="display: none;"><i class="fa fa-chevron-down"></i></a>
	<a href="#" id="ocultarAdd"><i class="fa fa-chevron-up"></i></a>
	Asignar Estudiante a Requirement
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
	
	$data = Profile::model()->crearArrayStudentsRequirement($model->id);
	if(empty($data)){
		echo TbHtml::muted('No hay Estudiantes disponibles para asignar,'.TbHtml::b(' ya todos los Estudiantes activos tienen un Tutor asignado.'));
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
				<?php echo CHtml::hiddenField('idRequirement',$model->id); ?>
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
	<?php }?>
</div>

<?php /*echo TbHtml::button('Asignar Requirement a estudiante', array(
    'color' => TbHtml::BUTTON_COLOR_PRIMARY,
    'submit' => array('assign','id'=>$model->id)
    )); */
?>

<?php /*echo TbHtml::button('Generar PDF', array(
    'color' => TbHtml::BUTTON_COLOR_SUCCESS,
    'submit' => array('load','id'=>$model->id)
    )); */
?>

<?php /*$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
     'id'=>'myModal',
     'options'=>array(
         'title'=>'Asignar Requirement a estudiante',
         'autoOpen'=>false,
         'modal'=>true,
         'width'=>400,
         'height'=>430,
         'resizable'=>false,
     ),
   ));
    $student = new Students;
    echo $this->renderPartial('_student', array('model'=>$model, 'student'=>$student));*/
?>
<?php //$this->endWidget('zii.widgets.jui.CJuiDialog'); ?>

<?php /*echo TbHtml::button('Asignar Requirement a estudiante', array(
    'style' => TbHtml::BUTTON_COLOR_SUCCESS,
    'size' => TbHtml::BUTTON_SIZE_DEFAULT,
    'data-toggle' => 'modal',
    //'data-target' => '#myModal',
    'onclick' => '$("#myModal").dialog("open"); return false;',
)); */?>

<!-- Box de Students Asignados -->
<?php $this->beginWidget('yiiwheels.widgets.box.WhBox', array(
    'title' => 'Estudiantes asignados al Requirement',
    'headerIcon' => 'icon-th-list',
    /*'headerButtons' => array(
            TbHtml::buttonGroup(
                array(
                    array(
                        'label' => 'Asignar Requirement a estudiante', 
                        'onclick' => '$("#myModal").dialog("open"); return false;'),                 
                )
            ),
        ),*/
    //'content' => displayStudents($model->students),
)); ?>
<?php 
    ?>
<?php 
	$dataProvider=new CActiveDataProvider('Students', array(
    'criteria'=>array(
        //'condition'=>'EXISTS (SELECT * FROM essays_has_cruge_user WHERE students_id = id)',
		'condition'=>'requirements_id = :id',
        'params'=>array(':id'=>$model->id),
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
                'name' => 'Requirements',
                'type' => 'raw',
                /*'value' => "CHtml::link('Ver / Generar PDF',
                       array('requirements/report/idr/$model->id/ids/".'$data->id'."'),
                       array('target'=>'_blank'))",*/
				'value' => function($data,$row) use($model){return Requirements::model()->getLinkRequirement($model->id,$data->id);},
			),			
			array(
                'name' => '',
                'type' => 'raw',
                'value' =>"TbHtml::submitButton('Remover',array(
                        'submit'=>array('remove','id'=>".'$data->id'."),
						'params'=>array('idx'=>$model->id),
						'confirm'=>'Desea remover al estudiante del Requirement?',
                        'color'=>TbHtml::BUTTON_COLOR_DANGER,
                        'size'=>TbHtml::BUTTON_SIZE_MINI,
                    ))",
			),
    
    /*$this->widget('yiiwheels.widgets.grid.WhGridView', array(
	'fixedHeader' => true,
	'headerOffset' => 40,
	'type' => 'striped',
	'dataProvider' => $dataProvider,
	'responsiveTable' => true,
	'template' => "{items}",
	'columns' => array(
            'id',
            'firstname',
            'lastname1',
            'email',
            array(
                'name' => '',
                'type' => 'raw',
                'value' => "CHtml::link('Ver / Generar PDF',
                       array('requirements/report/idr/$model->id/ids/$student->id'),
                       array('target'=>'_blank'))",                
                /*'value' => "CHtml::link('Ver PDF',
                       array('generate/index', array('idr' => '[$model->id]', 'ids' => '[$student->id]')),
                       array('target'=>'_blank'))",*/
           /* ),*/
         ),
));?>

<?php $this->endWidget();?>
<!-- End Box de Students Asignados -->

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