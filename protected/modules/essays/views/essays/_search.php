<?php
/* @var $this EssaysController */
/* @var $model Essays */
/* @var $form CActiveForm */
?>

<div class="wide form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

                    <?php echo $form->textFieldControlGroup($model,'id_essays',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'colleges_has_majors_colleges_id',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'colleges_has_majors_majors_id',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'type_essay_id',array('span'=>5)); ?>

                    <?php echo $form->textFieldControlGroup($model,'title',array('span'=>5,'maxlength'=>128)); ?>

                    <?php echo $form->textFieldControlGroup($model,'file_name',array('span'=>5,'maxlength'=>128)); ?>

                    <?php echo $form->textFieldControlGroup($model,'regdate',array('span'=>5,'maxlength'=>30)); ?>

                    <?php echo $form->textFieldControlGroup($model,'update',array('span'=>5,'maxlength'=>30)); ?>

        <div class="form-actions">
        <?php echo TbHtml::submitButton('Search',  array('color' => TbHtml::BUTTON_COLOR_PRIMARY,));?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- search-form -->