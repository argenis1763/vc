<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'layout' => TbHtml::FORM_LAYOUT_VERTICAL,
	'enableAjaxValidation'=>false,
        'htmlOptions' => array('class' => ''),
)); ?>
<fieldset>
	<p class="help-block">Campos con <span class="required">*</span> son necesarios.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldControlGroup($model,'name',array('class'=>'span5','maxlength'=>256)); ?>
        
        <?php /*echo $form->dropDownListControlGroup(Colleges::model(), 'id',
            CHtml::listData(Colleges::model()->findAll(array('order'=>'name ASC')), 'id','name'),array('multiple' => true,'class'=>'span5','maxlength'=>256)
            ); */?>  
			
		<p>Colleges <span class="required">*</span></p>
		<?php
		$Options = array(); 
		foreach($model->colleges as $colleges) $Options[$colleges->id] = array('selected' => 'selected');
		$form->widget('yiiwheels.widgets.multiselect.WhMultiSelect', array(
				//'model'=> $model->requirementsHasRequirementsFields,
				'name' => 'colleges',
				//'attribute' => 'id',
				'data' => CHtml::listData(Colleges::model()->findAll(array('order'=>'name ASC')), 'id','name'),
				'pluginOptions' => array(
					'includeSelectAllOption' => false,
					'enableFiltering' => true,
					'enableCaseInsensitiveFiltering' => true,
					'buttonWidth' => '300',
					'maxHeight' => '300',
				),
				'htmlOptions' => array('options' => $Options)/*array('1'=> array('selected' => 'selected')))*/,
			));
		?> 
		<br />
		<br />
		
        <?php echo $form->dropDownListControlGroup($model, 'categories_majors_id',
            CHtml::listData(CategoriesMajors::model()->findAll(array('order'=>'name ASC')), 'id','name')
            ); ?>    

        <?php echo $form->textAreaControlGroup($model,'description',array('span'=>6,'rows'=>10,'maxlength'=>11000)); ?>
      </fieldset> 
        <?php echo TbHtml::formActions(array (
            TbHtml::submitButton($model->isNewRecord ? 'Procesar' : 'Guardar', array('color'=>  TbHtml::BUTTON_COLOR_PRIMARY)), 
        ));
        ?>

<?php $this->endWidget(); ?>
