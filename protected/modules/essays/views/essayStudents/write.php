<?php
/* @var $this EssaysController */
/* @var $dataProvider CActiveDataProvider */
?>

<?php
$this->breadcrumbs=array(
	'Essays',
);

$this->menu=array(
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/list29.png") . 'Mis Essays','url'=>array('index'),'visible'=>Yii::app()->user->checkAccess('Estudiante') && !Yii::app()->user->isSuperAdmin),
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/group.png") . 'Mis Estudiantes','url'=>array('index'),'visible'=>Yii::app()->user->checkAccess('Tutor') || Yii::app()->user->checkAccess('College') || Yii::app()->user->isSuperAdmin),
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/speech59.png") . 'Chat','url'=>'#'),
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/user.png") . 'Perfil','url'=>'#','visible'=>Yii::app()->user->checkAccess('Estudiante') && !Yii::app()->user->isSuperAdmin)
);
?>
<legend>Essay: <?php echo $essay->title_essay?></legend>

<?php echo TbHtml::beginFormTb(TbHtml::FORM_LAYOUT_INLINE); ?>

	<?php echo TbHtml::label('<b>Status Essay</b>', 'text'); ?>
	<?php echo EssaysHasCrugeUser::model()->validarStatus($essay->status); ?>
		
	<?php if(Yii::app()->user->checkAccess('Tutor') || Yii::app()->user->checkAccess('College') || Yii::app()->user->isSuperAdmin /*&& $essay->status != 9*/){?>
		<?php echo "|";?>
		<?php
		echo TbHtml::Button('Cambiar Status', array(
			'name' => 'end',
			'color' => TbHtml::BUTTON_COLOR_DANGER,
			'size' => TbHtml::BUTTON_SIZE_MINI,
			'onclick' => '$("#myModal").dialog("open"); return false;',
			//'disabled' => $essay->status != 7 && $essay->status != 10? false : true,
		));		
		?>	
		<?php echo CHtml::hiddenField('idEssay',$essay->id_essay_cruge); ?>
		<?php 
			if($essay->status == 8){
				echo "| ";
				echo TbHtml::submitButton('Finalizar Essay', array(
					'name' => 'end',
					//'submit' => array('write','id' => $essay->id_essay_cruge),
					'color' => TbHtml::BUTTON_COLOR_PRIMARY,
					'size' => TbHtml::BUTTON_SIZE_MINI,
					//'disabled' => $essay->status == 8? false : true,
				));	
			}			
		?>			
	<?php } ?>
<?php echo TbHtml::endForm(); ?><!-- form -->

<?php 
	if(Yii::app()->user->hasFlash('status')){ 
		//$msg = Yii::app()->user->getFlash('status');
		echo TbHtml::alert(TbHtml::ALERT_COLOR_SUCCESS,Yii::app()->user->getFlash('status'));		
	} 
?>

<legend>
	<a href="#" id="mostrarInf"><i class="fa fa-chevron-down"></i></a>
	<a href="#" id="ocultarInf" style="display: none;"><i class="fa fa-chevron-up"></i></a>
	Información del Essay
</legend>
<div id="informacion" style="display: none;">
<!-- Informacion de tutor/estudiante -->
<?php 
	if(Yii::app()->user->checkAccess('Tutor') || Yii::app()->user->checkAccess('College') || Yii::app()->user->isSuperAdmin){
		$user = Students::model()->findByPk($essay->students_id);
		$name = "Estudiante";
	}else if(Yii::app()->user->checkAccess('Estudiante') && !Yii::app()->user->isSuperAdmin){
		$stundet = Students::model()->findByPk($essay->students_id);
		$user = Tutor::model()->findByPk($stundet->tutor_id);
		$name = "Tutor";
	}
	
	$this->beginWidget('yiiwheels.widgets.box.WhBox', array(
    'title' => $name." Asignado",
    'headerIcon' => 'icon-user',
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

<?php $this->widget('zii.widgets.CDetailView',array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data'=>$user,
    'attributes'=>array(
		/*array(
			'name' => 'id',
			'label' => 'ID',
		),*/		
		array(
			'type' => 'raw',
			'label' => 'Nombre',
			'value' => Profile::model()->nombreCompleto($user->profile->firstname,$user->profile->secondname),
		),		
		array(
			'type' => 'raw',
			'label' => 'Apellido',
			'value' => Profile::model()->apellidoCompleto($user->profile->lastname1,$user->profile->lastname2),
		),	
		array(
			'value' => Profile::model()->validarSexo($user->profile->sex),
			'type' => 'raw',
			'label' => 'Sexo',
		),			
		array(
			'name' => 'profile.email',
			'label' => 'Correo',
		),
		/*array(
			'name' => 'Status Essay',
			'type' => 'raw',
			'value'=> EssaysHasCrugeUser::model()->validarStatus($essay->status),					
		),	*/	
	),
)); ?>

<?php $this->endWidget();?>
<!-- End Box de Informacion tutor/estudiante -->
</div>

<?php 
	if(Yii::app()->user->hasFlash('save')){ 
		echo TbHtml::alert(TbHtml::ALERT_COLOR_SUCCESS, Yii::app()->user->getFlash('save'));		
	}else if(Yii::app()->user->hasFlash('send')){
		echo TbHtml::alert(TbHtml::ALERT_COLOR_SUCCESS, Yii::app()->user->getFlash('send'));
	}else if(Yii::app()->user->hasFlash('upload')){
		echo TbHtml::alert(TbHtml::ALERT_COLOR_SUCCESS, Yii::app()->user->getFlash('upload'));
	}else if(Yii::app()->user->hasFlash('end')){
		echo TbHtml::alert(TbHtml::ALERT_COLOR_SUCCESS, Yii::app()->user->getFlash('end'));
	}else if(Yii::app()->user->hasFlash('file')){	
		echo TbHtml::alert(TbHtml::ALERT_COLOR_ERROR, Yii::app()->user->getFlash('file'));
	}else if(Yii::app()->user->hasFlash('error')){	
		echo TbHtml::alert(TbHtml::ALERT_COLOR_ERROR, Yii::app()->user->getFlash('error'));
	}
?>

<?php
	$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'id' => 'essays-form',
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation' => false,
		'htmlOptions' => array('enctype' => 'multipart/form-data'),
		'clientOptions' => array(
			'validateOnSubmit' => true,
		),
	));
			
?>
	<?php echo $form->errorSummary($model); ?>	
	
	<?php if ($model->isNewRecord) { ?>
	<?php echo $form->textArea($model, 'content', array('id' => 'editor1','span' => 8, 'rows' => 5)); ?>
	<?php } else { ?>
	<?php
		/*$criteria = new CDbCriteria;
		$criteria->condition = "essays_has_cruge_user_id_essay_cruge= :searched";
		$criteria->params = array(":searched"=>$model->id_essay_cruge);

		$essay=EssaysDetail::model()->find($criteria);*/	
	?>
	<?php echo $form->textArea($model, 'content', array('id' => 'editor1','span' => 8, 'rows' => 5)); ?>
	<?php }?>
	
	<?php 
		if(Yii::app()->user->checkAccess('Estudiante') && !Yii::app()->user->isSuperAdmin){
			echo "<br />";
			echo TbHtml::muted('El límite de palabras permitidas para elaborar el Essay es de un máximo de '.  TbHtml::b('4000.'));
		}
	?>

	<?php 
		if(Yii::app()->user->checkAccess('Tutor') || Yii::app()->user->checkAccess('College') || Yii::app()->user->isSuperAdmin){
			echo $form->fileFieldControlGroup(new EssaysHistorical, 'file_name', array('type' => 'pdf', 'required' => true, 'help' => 'Solo se permiten subir archivos con la extensión *.pdf.', 'disabled' => $essay->status == 8? false : true)); 
		}
	?>
	
	<?php echo CHtml::hiddenField('idEssay',$essay->id_essay_cruge); ?>
	
	<script type="text/javascript">
			CKEDITOR.replace( 'editor1', {
					 filebrowserBrowseUrl: '<?php echo Yii::app()->baseUrl; ?>/kcfinder/browse.php?type=files',
					 filebrowserImageBrowseUrl: '<?php echo Yii::app()->baseUrl; ?>/kcfinder/browse.php?type=images',
					 filebrowserFlashBrowseUrl: '<?php echo Yii::app()->baseUrl; ?>/kcfinder/browse.php?type=flash',
					 filebrowserUploadUrl: '<?php echo Yii::app()->baseUrl; ?>/kcfinder/upload.php?type=files',
					 filebrowserImageUploadUrl: '<?php echo Yii::app()->baseUrl; ?>/kcfinder/upload.php?type=images',
					 filebrowserFlashUploadUrl: '<?php echo Yii::app()->baseUrl; ?>/kcfinder/upload.php?type=flash',
					 toolbar: [
						{ name: 'document', items: [ 'Source', '-', 'NewPage', 'Preview', 'Print', '-', 'Templates' ] },	// Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
						[ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ],						// Defines toolbar group without name.
						{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ], items: [ 'Find', 'Replace', '-', 'SelectAll', '-', 'Scayt' ] },
						//{ name: 'forms', items: [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ] },								
						'/',																					// Line break - next group will be placed in new line.
						{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },
						{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl' ] },
						{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
						{ name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak' ] },
						'/',
						{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
						{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },
						{ name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
						{ name: 'others', items: [ '-' ] },
					 ],							 
					 toolbarGroups: [
						{ name: 'document',	   groups: [ 'mode', 'document' ] },			// Displays document group with its two subgroups.
						{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },			// Group's name will be used to create voice label.
						'/',																// Line break - next group will be placed in new line.
						{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
						{ name: 'links' }
					 ],						 
			});
	</script>		
	<div class="form-actions">
	<?php if(Yii::app()->user->checkAccess('Estudiante') && !Yii::app()->user->isSuperAdmin){?>
		<?php
		echo TbHtml::submitButton('Guardar', array(
			'color' => TbHtml::BUTTON_COLOR_PRIMARY,
			'size' => TbHtml::BUTTON_SIZE_DEFAULT,
			'disabled' => $essay->status == 6 || $essay->status == 8 || $essay->status == 10? true : false,
		));
		?>
		
		<?php
		echo TbHtml::submitButton('Enviar Essay', array(
			'name' => 'send',
			'color' => TbHtml::BUTTON_COLOR_SUCCESS,
			'size' => TbHtml::BUTTON_SIZE_DEFAULT,
			'disabled' => $essay->status == 6 || $essay->status == 8 || $essay->status == 10? true : false,
		));		
		?>
	<?php } else if(Yii::app()->user->checkAccess('Tutor') || Yii::app()->user->isSuperAdmin){?>
		<?php
		echo TbHtml::submitButton('Enviar Correción', array(
			'name' => 'upload',
			'color' => TbHtml::BUTTON_COLOR_SUCCESS,
			'size' => TbHtml::BUTTON_SIZE_DEFAULT,
			'disabled' => $essay->status == 8? false : true,
		));		
		?>	
	<?php } ?>
	</div>
<?php $this->endWidget(); ?>

<legend>
	<a href="#" id="mostrarCorr"><i class="fa fa-chevron-down"></i></a>
	<a href="#" id="ocultarCorr" style="display: none;"><i class="fa fa-chevron-up"></i></a>
	Historico de Correciones
</legend>

<div id="correcciones" style="display: none;">			
<!-- Historial de Essay -->
<?php $this->beginWidget('yiiwheels.widgets.box.WhBox', array(
    'title' => 'Essays: Historico de Correcciones',
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
	
	$dataProvider=new CActiveDataProvider('EssaysHistorical', array(
    'criteria'=>array(
		'condition'=>'file_name IS NOT NULL AND essays_has_cruge_user_id_essay_cruge = :id ORDER BY lastdate DESC',
        'params'=>array(':id'=>$essay->id_essay_cruge),
    ),
    ));
	
    $this->widget('yiiwheels.widgets.grid.WhGridView', array(
	'type' => TbHtml::GRID_TYPE_STRIPED,
	'dataProvider' => $dataProvider,
	'template' => "{summary}{items}{pager}",
	'enablePagination' => true,
	'columns' => array(
            array(
				'name' => 'ID',
				'value' => '$data->id',
			),
			array(
				'name' => 'Archivo',
				//'value' => '$data->file_name',
				'value'=> function($data,$row) {return EssaysHistorical::model()->nameFile($data->file_name);},
			),
			array(
				'name' => 'Version',
				'value' => '$data->version',
			),
			array(
				'name' => 'Ultima Actualización',
				'type' => 'datetime',
				'value' => '$data->lastdate',
			),	
			/*array(
				'name' => 'Status',
				'type' => 'raw',
				'value'=> function($data,$row) use ($essay) {return EssaysHasCrugeUser::model()->validarStatus($essay->status);},	
				'visible' => $essay->status != 8? false: true,				
			),*/	
			array(
                'name' => 'Essays',
                'type' => 'raw',
                'value' => function($data,$row) {return EssaysHistorical::model()->getLinkEssay($data->id);},			
				//'visible' => $essay->status != 9? true: false,
			),			
			array(
                'name' => 'Correcciones',
                'type' => 'raw',
                'value' => function($data,$row) {return EssaysHistorical::model()->getLinkCorr($data->file_name,$data->version);},			
				//'visible' => $essay->status != 9? true: false,
			),
         ),
));?>

<?php $this->endWidget();?>
<!-- End Box de Estudents sin Essay -->
</div>

<?php $this->beginWidget('zii.widgets.jui.CJuiDialog', array(
     'id'=>'myModal',
     'options'=>array(
         'title'=>'Cambiar Status',
         'autoOpen'=>false,
         'modal'=>true,
         'width'=>400,
         'height'=>300,
         'resizable'=>false,
     ),
   ));
    $status = new Status;
    echo $this->renderPartial('_chance', array('essay'=>$essay,'status'=>$status));
?>
<?php $this->endWidget('zii.widgets.jui.CJuiDialog'); ?>

<script>
$(document).ready(function(){

		$("#ocultarCorr").click(function(event){
			event.preventDefault();
			$("#correcciones").hide("slow");
			$("#ocultarCorr").hide();
			$("#mostrarCorr").show();
		});

		$("#mostrarCorr").click(function(event){
			event.preventDefault();
			$("#correcciones").show("slow");
			$("#mostrarCorr").hide();
			$("#ocultarCorr").show(); 
		});
		
		$("#ocultarInf").click(function(event){
			event.preventDefault();
			$("#informacion").hide("slow");
			$("#ocultarInf").hide();
			$("#mostrarInf").show();
		});

		$("#mostrarInf").click(function(event){
			event.preventDefault();
			$("#informacion").show("slow");
			$("#mostrarInf").hide();
			$("#ocultarInf").show(); 
		});	
		
});
</script> 
<script>
$(function(){
  // validamos los campos del form submits
  $('#essays-form').submit(function(){
		var limit = 4000;
		var text_value = CKEDITOR.instances["editor1"].getData();

		var normalizedText = text_value.replace(/<[^<|>]+?>|/g,'').replace(/(\r\n|\n|\r)/g, " ").replace(/^\s+|\s+$/g, '').replace(/&nbsp;/g, ' ');

		var words = normalizedText.split(/\s+/);

		for (var wordIndex = words.length - 1; wordIndex >= 0; wordIndex--) {
			if (words[wordIndex].match(/^([\s\t\r\n]*)$/)) {
				words.splice(wordIndex, 1);
			}
		}		
		
		wordCount = words.length;		

		if(wordCount > limit) {
			alertify.alert("El Essay a superado el limite de palabras permitidas.<br/>Palabras introducidas: <b>"+wordCount+"</b><br/>Palabras permitidas: <b>4000</b>");	
			return false;
		}	
		
  });
});
</script>
