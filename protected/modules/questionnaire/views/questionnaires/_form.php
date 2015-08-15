<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	//'id'=>'questionnaires-form',
        'layout' => TbHtml::FORM_LAYOUT_VERTICAL,
	'enableAjaxValidation'=>false,
        'htmlOptions' => array('class' => 'well'),
)); ?>
<fieldset>
	<p class="help-block">Campos con <span class="required">*</span> con necesarios.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldControlGroup($model,'name',array('class'=>'span5','maxlength'=>512)); ?>

	<?php echo $form->textFieldControlGroup($model,'status',array('class'=>'span5')); ?>
</fieldset>
        <?php echo TbHtml::formActions(array (
            TbHtml::submitButton('Crear', array('color'=>  TbHtml::BUTTON_COLOR_PRIMARY)), 
        ));
        ?>

<?php $this->endWidget(); ?>
