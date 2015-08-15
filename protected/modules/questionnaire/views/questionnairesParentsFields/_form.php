<legend>Padres / Representantes</legend>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	//'id'=>'questionnaires-parents-fields-form',
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

	<?php echo $form->textAreaControlGroup($model,'pad1',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaControlGroup($model,'pad2',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaControlGroup($model,'pad3',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaControlGroup($model,'pad4',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaControlGroup($model,'pad5',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaControlGroup($model,'pad6',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaControlGroup($model,'pad7',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaControlGroup($model,'pad8',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaControlGroup($model,'pad9',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaControlGroup($model,'pad10',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaControlGroup($model,'pad11',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaControlGroup($model,'pad12',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaControlGroup($model,'pad13',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaControlGroup($model,'pad14',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaControlGroup($model,'pad15',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaControlGroup($model,'pad16',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textAreaControlGroup($model,'pad17',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>
</fieldset>
        <?php echo TbHtml::formActions(array (
            TbHtml::submitButton('Crear', array('color'=>  TbHtml::BUTTON_COLOR_PRIMARY)), 
        ));
        ?>

<?php $this->endWidget(); ?>
