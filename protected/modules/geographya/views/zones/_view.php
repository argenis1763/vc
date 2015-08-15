<?php
/* @var $this ZonesController */
/* @var $data Zones */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_zone')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_zone), array('view', 'id'=>$data->id_zone)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />


</div>