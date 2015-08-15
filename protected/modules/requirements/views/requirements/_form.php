<?php
/* @var $this RequirementsController */
/* @var $model Requirements */
/* @var $form TbActiveForm */
?>

<div class="form">

    <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
	'id'=>'requirements-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
    )); 
    ?>

    <p class="help-block">Campos con <span class="required">*</span> son necesarios.</p>
    
    <?php echo $form->errorSummary($model); ?>
            <?php $sql = "SELECT * FROM `colleges` WHERE NOT EXISTS (SELECT * FROM `requirements` WHERE `requirements`.colleges_id = `colleges`.id) ORDER BY `colleges`.name ASC";?>
            <?php echo $form->dropDownListControlGroup($model, 'colleges_id',
                    CHtml::listData(Colleges::model()->findAllBySql($sql), 'id','name')
                  ); 
            ?>  
    
            <?php /*$this->widget('yiiwheels.widgets.formhelpers.WhDatePickerHelper',array(
                    'name' => 'create_date',
                    'inputOptions' => array('class' => 'input-medium'),
                    'value' => date("Y-m-d"),
            ));*/?>

            <?php echo $form->hiddenField($model,'create_date',array('type'=>"hidden", 'value'=>date("Y-m-d"))); ?>
            
            <p>Campos para elaborar el requisito</p>
            <?php
            $Options = array(); 
            foreach($model->requirementsHasRequirementsFields as $requirementsHasRequirementsField) $Options[$requirementsHasRequirementsField->requirements_fields_id] = array('selected' => 'selected');
            $form->widget('yiiwheels.widgets.multiselect.WhMultiSelect', array(
                    //'model'=> $model->requirementsHasRequirementsFields,
                    'name' => 'requirementsFields',
                    //'attribute' => 'id',
                    'data' => CHtml::listData(RequirementsFields::model()->findAll(array('order'=>'name ASC')), 'id','name'),
                    'pluginOptions' => array(
                        'includeSelectAllOption' => false,
                        'enableFiltering' => true,
                        'enableCaseInsensitiveFiltering' => true,
                        'maxHeight' => '300',
                    ),
                    'htmlOptions' => array('options' => $Options)/*array('1'=> array('selected' => 'selected')))*/,
                ));
            ?>
            <?php //echo CHtml::error($model,'id'); ?>
            
        <div class="form-actions">
        <?php echo TbHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Guardar',array(
		    'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
		    'size'=>TbHtml::BUTTON_SIZE_DEFAULT,
		)); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->