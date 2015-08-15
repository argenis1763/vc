<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'as1',array('class'=>'span5','maxlength'=>256)); ?>

	<?php echo $form->textFieldRow($model,'as2',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'as2_indicate',array('class'=>'span5','maxlength'=>128)); ?>

	<?php echo $form->textFieldRow($model,'as3_hearing',array('class'=>'span5','maxlength'=>128)); ?>

	<?php echo $form->textFieldRow($model,'as4_visual',array('class'=>'span5','maxlength'=>128)); ?>

	<?php echo $form->textFieldRow($model,'as5_dreams_or_sleep',array('class'=>'span5','maxlength'=>128)); ?>

	<?php echo $form->textFieldRow($model,'as6_practices_sport',array('class'=>'span5','maxlength'=>128)); ?>

	<?php echo $form->textFieldRow($model,'as7_lost_memory',array('class'=>'span5','maxlength'=>128)); ?>

	<?php echo $form->textFieldRow($model,'as8',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'as9',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'as10',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'as11',array('class'=>'span5','maxlength'=>512)); ?>

	<?php echo $form->textFieldRow($model,'questionnaires_id',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
