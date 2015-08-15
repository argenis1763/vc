<?php
/* @var $this StudentsController */
/* @var $model Students */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'students-data_form-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// See class documentation of CActiveForm for details on this,
	// you need to use the performAjaxValidation()-method described there.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'identification'); ?>
		<?php echo $form->textField($model,'identification'); ?>
		<?php echo $form->error($model,'identification'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'firstname'); ?>
		<?php echo $form->textField($model,'firstname'); ?>
		<?php echo $form->error($model,'firstname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'secondname'); ?>
		<?php echo $form->textField($model,'secondname'); ?>
		<?php echo $form->error($model,'secondname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lastname1'); ?>
		<?php echo $form->textField($model,'lastname1'); ?>
		<?php echo $form->error($model,'lastname1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'lastname2'); ?>
		<?php echo $form->textField($model,'lastname2'); ?>
		<?php echo $form->error($model,'lastname2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tel_local'); ?>
		<?php echo $form->textField($model,'tel_local'); ?>
		<?php echo $form->error($model,'tel_local'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tel_mobil'); ?>
		<?php echo $form->textField($model,'tel_mobil'); ?>
		<?php echo $form->error($model,'tel_mobil'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_of_birth'); ?>
		<?php echo $form->textField($model,'date_of_birth'); ?>
		<?php echo $form->error($model,'date_of_birth'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'parents_identification'); ?>
		<?php echo $form->textField($model,'parents_identification'); ?>
		<?php echo $form->error($model,'parents_identification'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_college'); ?>
		<?php echo $form->textField($model,'user_college'); ?>
		<?php echo $form->error($model,'user_college'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'pass_college'); ?>
		<?php echo $form->textField($model,'pass_college'); ?>
		<?php echo $form->error($model,'pass_college'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'address'); ?>
		<?php echo $form->textField($model,'address'); ?>
		<?php echo $form->error($model,'address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Submit'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->