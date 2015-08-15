<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'identification',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'firstname',array('class'=>'span5','maxlength'=>64)); ?>

	<?php echo $form->textFieldRow($model,'secondname',array('class'=>'span5','maxlength'=>64)); ?>

	<?php echo $form->textFieldRow($model,'lastname1',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'lastname2',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'tel_local',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'tel_mobil',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'email',array('class'=>'span5','maxlength'=>128)); ?>

	<?php echo $form->textFieldRow($model,'date_of_birth',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'user_college',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'pass_college',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'address',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'status',array('class'=>'span5','maxlength'=>45)); ?>

	<?php echo $form->textFieldRow($model,'user_id',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'parents_id',array('class'=>'span5','maxlength'=>45)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
