<?php
/* @var $this EssaysController */
/* @var $model Essays */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'essays-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

    <p class="help-block">Campos con <span class="required">*</span> son requeridos.</p>

    <?php echo $form->errorSummary($model); ?>

			<p>Nombre de College <span class="required">*</span></p>
			<p>
			<?php
			
			$criteria = new CDbCriteria;
			//$criteria->condition = "EXISTS (SELECT 1 FROM colleges_has_majors WHERE colleges_id = id) ORDER BY name ASC";
			$criteria->condition = "EXISTS (SELECT name FROM colleges) ORDER BY name ASC";
			$data = Colleges::model()->findAll($criteria);
			
			$form->widget('yiiwheels.widgets.select2.WhSelect2', array(
			'model' => $model,
			'attribute' => 'colleges_has_majors_colleges_id',
			'name' => 'selectCollege',
			'asDropDownList' => true,
			'data' => CHtml::listData($data, 'id','name'),
			'pluginOptions' => array(
				'allowClear' => true,
				//'minimumInputLength' => 2,
				'width' => '40%',
			),
			'htmlOptions' => array(
				'prompt' => 'Seleccione un College...',
			)));
			?>	
			</p>
			<br />
			
			<p>Nombre de Major <span class="required">*</span></p>
			<p>
			<?php
			$form->widget('yiiwheels.widgets.select2.WhSelect2', array(
			'model' => $model,
			'attribute' => 'colleges_has_majors_majors_id',
			'name' => 'selectMajor',
			'asDropDownList' => true,
			'data' => array(''),//CHtml::listData(Majors::model()->findAll(array('order'=>'name ASC')), 'id','name'),
			'pluginOptions' => array(
				'allowClear' => true,
				//'minimumInputLength' => 2,
				'width' => '40%',
			),
			'htmlOptions' => array(
				'prompt' => 'Seleccione un Major...',
				'disabled' => false,
			)));
			?>	
			</p>
			<br />

            <?php echo $form->dropDownListControlGroup($model,'type_essay_id',CHtml::listData(EssayType::model()->findAll(array('order'=>'name ASC')), 'id','name','short_name')); ?>

            <?php echo $form->textAreaControlGroup($model,'title',array('span'=>8,'rows'=>10,'maxlength'=>2048)); ?>	
			
			<?php //echo $form->fileFieldControlGroup($model, 'file_name', array('type' => 'pdf')); ?>			

            <?php echo Chtml::activeHiddenField($model,'regdate',array('value'=>time())); ?>

            <?php //echo $form->textFieldControlGroup($model,'update',array('span'=>5,'maxlength'=>30,'readonly'=>'readonly')); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_LARGE,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->
<script type="text/javascript">
	$(document).ready(function(){
		$("#selectCollege").change(function(){
		if($(this).val()!=""){
		var dato=$(this).val();
		$.ajax({
		type:"POST",
		dataType:"html",
		url:"/via-college/essays/essays/cargarMajor",
		data:"idCollege="+dato,
		success:function(msg){
			$("#selectMajor").empty().removeAttr("disabled").append(msg);
			//alert(msg);
		}

		});

		}else{
			alert("seleccione un college");
			$("#selectMajor").empty().attr("disabled","disabled");
		}

		});
			
	});
</script>

