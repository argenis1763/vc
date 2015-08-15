<legend>Antecedentes de Salud</legend>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	//'id'=>'questionnaires-medical-fields-form',
        'layout' => TbHtml::FORM_LAYOUT_VERTICAL,
	'enableAjaxValidation'=>false,
        'htmlOptions'=>array('class'=>''),
)); ?>
<fieldset>
        <p class="help-block">Campos con <span class="required">*</span> son requeridos.</p>
	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textAreaControlGroup($model,'as1',array('class'=>'span5','maxlength'=>256, 'hint'=>'Puedes ingresar hasta 65000 caracteres.')); ?>

	<?php echo $form->textFieldControlGroup($model,'as2',array('class'=>'span5')); ?>

	<?php echo $form->textAreaControlGroup($model,'as2_indicate',array('class'=>'span5','maxlength'=>128, 'hint'=>'Puedes ingresar hasta 128 caracteres.')); ?>

	<?php echo $form->textAreaControlGroup($model,'as3_hearing',array('class'=>'span5','maxlength'=>128, 'hint'=>'Puedes ingresar hasta 128 caracteres.')); ?>

	<?php echo $form->textAreaControlGroup($model,'as4_visual',array('class'=>'span5','maxlength'=>128, 'hint'=>'Puedes ingresar hasta 128 caracteres.')); ?>

	<?php echo $form->textAreaControlGroup($model,'as5_dreams_or_sleep',array('class'=>'span5','maxlength'=>128, 'hint'=>'Puedes ingresar hasta 128 caracteres.')); ?>

	<?php echo $form->textAreaControlGroup($model,'as6_practices_sport',array('class'=>'span5','maxlength'=>128, 'hint'=>'Puedes ingresar hasta 128 caracteres.')); ?>

	<?php echo $form->textAreaControlGroup($model,'as7_lost_memory',array('class'=>'span5','maxlength'=>128, 'hint'=>'Puedes ingresar hasta 128 caracteres.')); ?>

	<?php echo $form->textFieldControlGroup($model,'as8',array('class'=>'span5')); ?>

	<?php echo $form->textFieldControlGroup($model,'as9',array('class'=>'span5')); ?>

	<?php echo $form->textFieldControlGroup($model,'as10',array('class'=>'span5')); ?>

	<?php echo $form->textAreaControlGroup($model,'as11',array('class'=>'span5','maxlength'=>512, 'hint'=>'Puedes ingresar hasta 512 caracteres.')); ?>
</fieldset>
        <?php echo TbHtml::formActions(array (
            TbHtml::submitButton('Crear', array('color'=>  TbHtml::BUTTON_COLOR_PRIMARY)), 
        ));
        ?>
<?php $this->endWidget(); ?>
