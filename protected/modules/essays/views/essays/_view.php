<?php
/* @var $this EssaysController */
/* @var $data Essays */
?>

<div class="view">

    	<b><?php echo CHtml::encode($data->getAttributeLabel('id_essays')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_essays),array('view','id'=>$data->id_essays)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('colleges_has_majors_colleges_id')); ?>:</b>
	<?php echo CHtml::encode($data->colleges_has_majors_colleges_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('colleges_has_majors_majors_id')); ?>:</b>
	<?php echo CHtml::encode($data->colleges_has_majors_majors_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('type_essay_id')); ?>:</b>
	<?php echo CHtml::encode($data->type_essay_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('file_name')); ?>:</b>
	<?php echo CHtml::encode($data->file_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('regdate')); ?>:</b>
	<?php echo CHtml::encode($data->regdate); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('update')); ?>:</b>
	<?php echo CHtml::encode($data->update); ?>
	<br />

	*/ ?>

</div>