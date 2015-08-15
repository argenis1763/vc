<?php
/* @var $this StudentsController */
/* @var $data Students */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('profile_id')); ?>:</b>
	<?php echo CHtml::encode($data->profile_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_college')); ?>:</b>
	<?php echo CHtml::encode($data->user_college); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pass_college')); ?>:</b>
	<?php echo CHtml::encode($data->pass_college); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tutor_id')); ?>:</b>
	<?php echo CHtml::encode($data->tutor_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('requirements_id')); ?>:</b>
	<?php echo CHtml::encode($data->requirements_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parents_id')); ?>:</b>
	<?php echo CHtml::encode($data->parents_id); ?>
	<br />


</div>