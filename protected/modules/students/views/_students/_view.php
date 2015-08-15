<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('identification')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->identification),array('view','id'=>$data->identification)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('firstname')); ?>:</b>
	<?php echo CHtml::encode($data->firstname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('secondname')); ?>:</b>
	<?php echo CHtml::encode($data->secondname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lastname1')); ?>:</b>
	<?php echo CHtml::encode($data->lastname1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('lastname2')); ?>:</b>
	<?php echo CHtml::encode($data->lastname2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tel_local')); ?>:</b>
	<?php echo CHtml::encode($data->tel_local); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tel_mobil')); ?>:</b>
	<?php echo CHtml::encode($data->tel_mobil); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_of_birth')); ?>:</b>
	<?php echo CHtml::encode($data->date_of_birth); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_college')); ?>:</b>
	<?php echo CHtml::encode($data->user_college); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('pass_college')); ?>:</b>
	<?php echo CHtml::encode($data->pass_college); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parents_identification')); ?>:</b>
	<?php echo CHtml::encode($data->parents_identification); ?>
	<br />

	*/ ?>

</div>