<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	'Login',
);
?>

<legend><?php echo CrugeTranslator::t('logon',"Login"); ?></legend>
<?php if(Yii::app()->user->hasFlash('loginflash')): ?>
<div class="flash-error">
	<?php echo Yii::app()->user->getFlash('loginflash'); ?>
</div>
<?php else: ?>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	//'id'=>'logon-form',	
        'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
        'enableClientValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
        'htmlOptions' => array('class' => 'well'),
)); ?>
<fieldset>
        <p class="help-block">Campos con <span class="required">*</span> con necesarios.</p>
        
	<?php echo $form->textFieldControlGroup($model,'username'); ?>

	<?php echo $form->passwordFieldControlGroup($model,'password'); ?>

	<?php echo $form->checkBoxControlGroup($model,'rememberMe'); ?>
	
        <?php echo TbHtml::formActions(array (
            TbHtml::submitButton('Iniciar sesión', array('color'=>  TbHtml::BUTTON_COLOR_PRIMARY)), 
        ));
        ?>
	
		<?php //Yii::app()->user->ui->tbutton(CrugeTranslator::t('logon', "Login")); ?>
		<?php echo Yii::app()->user->ui->passwordRecoveryLink; ?>
		<?php
			if(Yii::app()->user->um->getDefaultSystem()->getn('registrationonlogin')===1)
				echo Yii::app()->user->ui->registrationLink;
		?>
	

	<?php
		//	si el componente CrugeConnector existe lo usa:
		//
		if(Yii::app()->getComponent('crugeconnector') != null){
		if(Yii::app()->crugeconnector->hasEnabledClients){ 
	?>
	<div class='crugeconnector'>
		<span><?php echo CrugeTranslator::t('logon', 'You also can login with');?>:</span>
		<ul>
		<?php 
			$cc = Yii::app()->crugeconnector;
			foreach($cc->enabledClients as $key=>$config){
				$image = CHtml::image($cc->getClientDefaultImage($key));
				echo "<li>".CHtml::link($image,
					$cc->getClientLoginUrl($key))."</li>";
			}
		?>
		</ul>
	</div>
	<?php }} ?>
	
</fieldset>
<?php $this->endWidget(); ?>
<?php endif; ?>
