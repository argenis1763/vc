<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	//'id'=>'colleges-form',
        'layout' => TbHtml::FORM_LAYOUT_VERTICAL,
	'enableAjaxValidation'=>false,
        'htmlOptions' => array('class' => ''),
)); ?>
<fieldset>
	<p class="help-block">Campos con <span class="required">*</span> con necesarios.</p>

	<?php echo $form->errorSummary($model); ?>

		<?php echo $form->textFieldControlGroup($model,'name',array('class'=>'span5','maxlength'=>128)); ?>
        
        <?php /*echo $form->dropDownListControlGroup(State::model(), 'id_state',
            CHtml::listData(State::model()->findAll(array('order'=>'name ASC')), 'id_state','name')
            ); */?>  

		<p>Estado <span class="required">*</span></p>
		<p>
		<?php
		$form->widget('yiiwheels.widgets.select2.WhSelect2', array(
		'model' => $model,
		'attribute' => 'state_id_state',
		//'name' => 'selectMajor',
		'asDropDownList' => true,
		'data' => CHtml::listData(State::model()->findAll(array('order'=>'name ASC')), 'id_state','name'),
		'pluginOptions' => array(
			'allowClear' => true,
			//'minimumInputLength' => 1,
			'width' => '40%',
		),
		'htmlOptions' => array(
			//'prompt' => 'Seleccione un Estado...',
			//'placeholder' => 'Select date',
		)));
		?>	
		</p>
		
		<br />
		<p>Majors <span class="required">*</span></p>
		<p>	
        <?php 
            $Options = array(); 
            foreach($model->collegesHasMajors as $collegesHasMajor) $Options[$collegesHasMajor->majors_id] = array('selected' => 'selected');		
        $form->widget('yiiwheels.widgets.multiselect.WhMultiSelect', array(
                'name' => 'majors',
                'data' => CHtml::listData(Majors::model()->findAll(array('order'=>'name ASC')), 'id','name'),
                'pluginOptions' => array(
                    //'includeSelectAllOption' => true,
					'nonSelectedText' => 'Seleccionar Majors',
					'filterPlaceholder' => 'Buscar Majors',
                    'enableFiltering' => true,
                    'enableCaseInsensitiveFiltering' => true,
                    'maxHeight' => '300',
					'buttonWidth' => '350',
                ),
				'htmlOptions' => array('options' => $Options)/*array('1'=> array('selected' => 'selected')))*/,
            ));
        ?>     
        </p>
        <?php
       /* $state = State::model()->findAll(array('order'=>'name ASC'));
                        echo "<PRE>";
                        print_r($state);
                        echo "</PRE>";
                        Yii::app()->end();    */  /*  
        $this->widget('yiiwheels.widgets.select2.WhSelect2', array(  
            //'data' => CHtml::listData(State::model()->findAll(array('order'=>'name ASC')), 'id_state','name'),
        'asDropDownList' => false,            
        'name' => 'select2test',
        'pluginOptions' => array(
            //'data-placeholder' => CHtml::listData(State::model()->findAll(array('order'=>'name ASC')), 'id_state','name'),
            'tags' => CHtml::listData(State::model()->findAll(array('order'=>'name ASC')), 'id_state','name'),
            //'data'=> CHtml::listData(State::model()->findAll(array('order'=>'name ASC')), 'id_state','name'),
            'data' => CHtml::listData(State::model()->findAll(array('order'=>'name ASC')), 'id_state','name'),
            //'select' => 'multiple',
            'multiple' => true,
            //'allowClear' => true,
            'placeholder' => 'type 2amigos',
            'width' => '40%',
            'tokenSeparators' => array(',', ' ')
        )));*/
        ?>        
</fieldset>
        <?php echo TbHtml::formActions(array (
            TbHtml::submitButton('Procesar', array('color'=>  TbHtml::BUTTON_COLOR_PRIMARY)), 
        ));
        ?>

<?php $this->endWidget(); ?>
