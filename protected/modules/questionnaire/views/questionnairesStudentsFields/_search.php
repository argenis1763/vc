<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'est1',array('class'=>'span5','maxlength'=>2048)); ?>

	<?php echo $form->textFieldRow($model,'est2',array('class'=>'span5','maxlength'=>2048)); ?>

	<?php echo $form->textFieldRow($model,'est3',array('class'=>'span5','maxlength'=>2048)); ?>

	<?php echo $form->textFieldRow($model,'est4',array('class'=>'span5','maxlength'=>2048)); ?>

	<?php echo $form->textFieldRow($model,'est5',array('class'=>'span5','maxlength'=>2048)); ?>

	<?php echo $form->textFieldRow($model,'est6',array('class'=>'span5','maxlength'=>256)); ?>

	<?php echo $form->textFieldRow($model,'est7',array('class'=>'span5','maxlength'=>2048)); ?>

	<?php echo $form->textFieldRow($model,'est8',array('class'=>'span5','maxlength'=>2048)); ?>

	<?php echo $form->textFieldRow($model,'questionnaires_id',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
