<?php
/* @var $this StudentsController */
/* @var $model Students */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

                    <?php echo $form->textFieldControlGroup($model,'id',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'profile_id',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'user_college',array('span'=>5,'maxlength'=>45)); ?>

                    <?php echo $form->textFieldControlGroup($model,'pass_college',array('span'=>5,'maxlength'=>45)); ?>

                    <?php echo $form->textFieldControlGroup($model,'tutor_id',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'requirements_id',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'parents_id',array('span'=>5)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton('Search',  array('color' => TbHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->