<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textField($model,'id',array('class'=>'span5')); ?>

	<?php echo $form->textField($model,'name',array('class'=>'span5','maxlength'=>256)); ?>

	<?php echo $form->textField($model,'description',array('class'=>'span5','maxlength'=>11000)); ?>

	<?php echo $form->textField($model,'categories_majors_id',array('class'=>'span5')); ?>

        <?php echo TbHtml::formActions(array(
            TbHtml::submitButton('Search', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
        )); ?>

<?php $this->endWidget(); ?>
