<?php
/* @var $this ParentsController */
/* @var $data Parents */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('id_parent')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_parent),array('view','id'=>$data->id_parent)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('profile_id')); ?>:</b>
	<?php echo CHtml::encode($data->profile_id); ?>
	<br />


</div>