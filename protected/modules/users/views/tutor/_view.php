<?php
/* @var $this TutorController */
/* @var $data Tutor */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tutor')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_tutor),array('view','id'=>$data->id_tutor)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('profile_id')); ?>:</b>
	<?php echo CHtml::encode($data->profile_id); ?>
	<br />


</div>