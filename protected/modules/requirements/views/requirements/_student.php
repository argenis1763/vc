<?php
/* @var $this RequirementsController */
/* @var $model Requirements */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'requirementsStudent-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
    )); 
    ?>

    <p class="help-block">Campos con <span class="required">*</span> son necesarios.</p>
    
    <?php echo $form->errorSummary($model); ?>
    
            <?php echo $form->textFieldControlGroup($student, 'firstname', array('placeholder' => 'Nombre' )); ?>
    
            <?php echo $form->textFieldControlGroup($student, 'lastname1',array('placeholder' => 'Apellido' )); ?>
    
            <?php echo $form->textFieldControlGroup($student, 'email', array('placeholder' => 'usuario@servidor.tld' )); ?>     

            <?php /*echo $form->dropDownListControlGroup($student, 'requirements_id',
                  CHtml::listData($model->model()->findAll(array('order'=>'id ASC')), 'id','colleges.name')
                  ); */
            ?>     
            
        <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Guardar' : 'Actualizar',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_DEFAULT,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->

