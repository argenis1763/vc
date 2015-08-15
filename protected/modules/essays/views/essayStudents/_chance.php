<?php
/* @var $this EssaysController */
/* @var $model Essays */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'status-form',
	'enableAjaxValidation'=>false,
)); ?>	
		<legend>Status de Essay</legend>
		<?php echo TbHtml::dropDownList('Status', '', CHtml::listData(Status::model()->findAll(array('order'=>'name ASC')), 'idstatus','name'));?>		

		<?php echo CHtml::hiddenField('idEssay',$essay->id_essay_cruge); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton('Actualizar',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_DEFAULT,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->