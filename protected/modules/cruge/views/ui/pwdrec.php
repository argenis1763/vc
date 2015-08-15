<legend><?php echo CrugeTranslator::t("Recuperar la clave"); ?></legend>

<?php if(Yii::app()->user->hasFlash('pwdrecflash')): ?>
<div class="flash-success">
	<?php echo Yii::app()->user->getFlash('pwdrecflash'); ?>
</div>
<?php else: ?>

<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	//'id'=>'pwdrcv-form',
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
        'enableClientValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
        'htmlOptions' => array('class' => 'well'),
)); ?>
<fieldset>   
        <?php echo $form->textFieldControlGroup($model,'username'); ?>
	
	<?php if(CCaptcha::checkRequirements()): ?>
	
		<?php echo $form->labelEx($model,'verifyCode'); ?>
		
		<?php $this->widget('CCaptcha'); ?>
		<?php echo $form->textFieldControlGroup($model,'verifyCode', array('help' => CrugeTranslator::t("por favor ingrese los caracteres o digitos que vea en la imagen"))); ?>
	
		<?php echo $form->error($model,'verifyCode'); ?>
	
	<?php endif; ?>
 </fieldset>   
        <?php echo TbHtml::formActions(array (
            TbHtml::submitButton('Recuperar la Clave', array('color'=>  TbHtml::BUTTON_COLOR_PRIMARY)), 
        ));
        ?>
	
<?php $this->endWidget(); ?>

<?php endif; ?>