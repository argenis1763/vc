<legend>Estudiante</legend>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	//'id'=>'questionnaires-students-fields-form',
        'layout' => TbHtml::FORM_LAYOUT_VERTICAL,
	'enableAjaxValidation'=>false,
        'htmlOptions'=>array('class'=>''),
)); ?>
<fieldset>
    <p>El siguiente cuestionario para estudiantes tiene como objetivo recaudar información 
        básica para iniciar el proceso de consultoría de admisión a las Universidades y “Colleges” 
        Norteamericanos realizado por VIA-College.</p>
    <p>Piensa en tu desarrollo durante bachillerato, especifica si has realizado alguna de 
        estas actividades. Desarrolla brevemente tu actividad, enumera eventos, fechas, duración y 
        rol ejecutado en cada una de estas actividades.</p>
 
	<p class="help-block">Campos con <span class="required">*</span> son necesarios.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textAreaControlGroup($model,'est1',array('class'=>'span5','maxlength'=>2048, 'hint'=>'Puedes ingresar hasta 2048 caracteres.')); ?>

	<?php echo $form->textAreaControlGroup($model,'est2',array('class'=>'span5','maxlength'=>2048, 'hint'=>'Puedes ingresar hasta 2048 caracteres.')); ?>

	<?php echo $form->textAreaControlGroup($model,'est3',array('class'=>'span5','maxlength'=>2048, 'hint'=>'Puedes ingresar hasta 2048 caracteres.')); ?>

	<?php echo $form->textAreaControlGroup($model,'est4',array('class'=>'span5','maxlength'=>2048, 'hint'=>'Puedes ingresar hasta 2048 caracteres.')); ?>

	<?php echo $form->textAreaControlGroup($model,'est5',array('class'=>'span5','maxlength'=>2048, 'hint'=>'Puedes ingresar hasta 2048 caracteres.')); ?>

	<?php echo $form->textAreaControlGroup($model,'est6',array('class'=>'span5','maxlength'=>256, 'hint'=>'Puedes ingresar hasta 256 caracteres.')); ?>

	<?php echo $form->textAreaControlGroup($model,'est7',array('class'=>'span5','maxlength'=>2048, 'hint'=>'Puedes ingresar hasta 2048 caracteres.')); ?>

	<?php echo $form->textAreaControlGroup($model,'est8',array('class'=>'span5','maxlength'=>2048, 'hint'=>'Puedes ingresar hasta 2048 caracteres.')); ?>
</fieldset>
        <?php echo TbHtml::formActions(array (
            TbHtml::submitButton('Crear', array('color'=>  TbHtml::BUTTON_COLOR_PRIMARY)), 
        ));
        ?>
<?php $this->endWidget(); ?>
