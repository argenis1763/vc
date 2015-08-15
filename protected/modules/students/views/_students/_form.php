<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	//'id'=>'students-form',
        'layout' => TbHtml::FORM_LAYOUT_VERTICAL,
	'enableAjaxValidation'=>false,
        'htmlOptions' => array('class' => 'well'),
)); ?>

<fieldset>
	<p class="help-block">Campos con <span class="required">*</span> con necesarios.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldControlGroup($model,'identification',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldControlGroup($model,'firstname',array('class'=>'span5','maxlength'=>64)); ?>

	<?php echo $form->textFieldControlGroup($model,'secondname',array('class'=>'span5','maxlength'=>64)); ?>

	<?php echo $form->textFieldControlGroup($model,'lastname1',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldControlGroup($model,'lastname2',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldControlGroup($model,'tel_local',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldControlGroup($model,'tel_mobil',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldControlGroup($model,'email',array('class'=>'span5','maxlength'=>128)); ?>

	<?php echo $form->textFieldControlGroup($model,'date_of_birth',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldControlGroup($model,'user_college',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldControlGroup($model,'pass_college',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldControlGroup($model,'address',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldControlGroup($model,'status',array('class'=>'span5','maxlength'=>45)); ?>

	<?php //echo $form->textFieldControlGroup($model,'user_id',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldControlGroup($model,'parents_id',array('class'=>'span5','maxlength'=>45)); ?>

</fieldset> 
        <?php echo TbHtml::formActions(array (
            TbHtml::submitButton('Crear', array('color'=>  TbHtml::BUTTON_COLOR_PRIMARY)), 
        ));
        ?>

<?php $this->endWidget(); ?>
