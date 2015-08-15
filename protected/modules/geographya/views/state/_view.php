<?php
/* @var $this StateController */
/* @var $data State */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_state')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_state), array('view', 'id'=>$data->id_state)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('zones_id_zone')); ?>:</b>
	<?php echo CHtml::encode($data->zones_id_zone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />


</div>