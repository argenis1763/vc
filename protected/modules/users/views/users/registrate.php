<?php
// $model: algo que implementa a ICrugeStoredUser, 
?>
<?php 
	if(Yii::app()->user->hasFlash('profile-flash')){ 
		echo TbHtml::alert(TbHtml::ALERT_COLOR_ERROR, Yii::app()->user->getFlash('profile-flash')); 
	} else if(Yii::app()->user->hasFlash('error')){
		echo TbHtml::alert(TbHtml::ALERT_COLOR_ERROR, Yii::app()->user->getFlash('error')); 	
	}
?>
<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'crugestoreduser-form',
    'layout' => TbHtml::FORM_LAYOUT_HORIZONTAL,
    'enableAjaxValidation'=>false,
    'enableClientValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),	
    'htmlOptions' => array('class' => 'well'),
           
)); ?>

<fieldset>
    
    <p class="note">Campos con <span class="required">*</span> son requeridos.</p>
    
    <legend>Registrar Usuario</legend>
    
			<?php echo $form->errorSummary($user); ?>
			
            <?php echo $form->textFieldControlGroup($user,'username',array('append' => TbHtml::icon(TbHtml::ICON_USER),'placeholder' => 'Username','required' => true)); ?>

            <?php echo $form->textFieldControlGroup($user,'email',array('append' => TbHtml::icon(TbHtml::ICON_ENVELOPE),'placeholder' => 'test@example.com','required' => true)); ?>

            <?php 
                echo $form->textFieldControlGroup($user,'newPassword',
                        array(
                            'append' => TbHtml::ajaxButton("Generar"
                                            ,Yii::app()->user->ui->ajaxGenerateNewPasswordUrl
                                            ,array('success'=>new CJavaScriptExpression('fnSuccess'),
                                                    'error'=>new CJavaScriptExpression('fnError'))
                                        ),
							'placeholder' => 'Contraseña',
							'readonly' => 'readonly',
							'required' => true,
							'help' => 'Presione el boton "Generar" para obtener un contraseña segura.', 
							'helpOptions' => array('type' => TbHtml::HELP_TYPE_BLOCK),
                            ));//TbHtml::button('Search'))); /*,array('help' => 'La contraseña debe incluir al menos 8 caracteres.')*///) 
            ?>
			
 			<?php echo TbHtml::inlineradioButtonListControlGroup('UserType', '', array(
				'1' => 'Estudiante',
				'2' => 'Padre',
				'3' => 'Tutor',
			),array('label'=>'Tipo de Usuario <span class="required">*</span>','required' => true)); ?>	        

    <script>
            function fnSuccess(data){
                    $('#CrugeStoredUser_newPassword').val(data);
            }
            function fnError(e){
                    alert("error: "+e.responseText);
            }
    </script>  
    
    <hr>
    
			<?php echo $form->errorSummary($profile); ?>	
			
            <?php echo $form->textFieldControlGroup($profile,'identification',array('placeholder' => 'Nº de Identificación','required' => true)); ?>

            <?php echo $form->textFieldControlGroup($profile,'firstname',array('placeholder' => 'Primer Nombre','required' => true)); ?>			
			
            <?php echo $form->textFieldControlGroup($profile,'lastname1',array('placeholder' => 'Primer Apellido','required' => true)); ?>

			<?php echo $form->radioButtonListControlGroup($profile, 'sex', array(
				'1' => 'Masculino',
				'2' => 'Femenino',
			),array('required' => true)); ?>			

			&nbsp;&nbsp;&nbsp;&nbsp;Fecha de Nacimiento <span class="required">*</span>&nbsp;&nbsp;&nbsp; 
			<div class="input-append">
				<?php $form->widget('yiiwheels.widgets.datepicker.WhDatePicker', array(
						//'name' => 'enddate',
						'model' => $profile,
						'attribute' => 'date_of_birth',											
						'pluginOptions' => array(
							'format' => 'yyyy-mm-dd',//'dd/mm/yyyy',
							'language' => 'es',
						),
						'htmlOptions' => array(
							'placeholder' => 'Seleccione una fecha',
							'readonly'=>'readonly',
							'required' => true,
						),
					));
				?>
				<span class="add-on"><icon class="icon-calendar"></icon></span>
			</div>			
			
			<?php /*echo TbHtml::controlsRow(array(
				TbHtml::buttonGroup(array(
					array('label' => 'Estudiante'),
					array('label' => 'Padre'),
					array('label' => 'Tutor'),
				), array('toggle' => TbHtml::BUTTON_TOGGLE_RADIO, 'color' => TbHtml::BUTTON_COLOR_PRIMARY)),
			)); */?>
    
    </fieldset>

    <?php echo TbHtml::formActions(array(
            TbHtml::submitButton('Registrarse', array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
        )); 
    ?>  


<?php $this->endWidget(); ?>