<?php
// $model: algo que implementa a ICrugeStoredUser, 
?>
<?php if(Yii::app()->user->hasFlash('profile-flash')){ ?>
    <?php echo TbHtml::alert(TbHtml::ALERT_COLOR_SUCCESS, Yii::app()->user->getFlash('profile-flash')); ?>
<?php } ?>
<?php $this->beginWidget('yiiwheels.widgets.box.WhBox', array(
    'title' => 'Información de Perfil',
    'headerIcon' => 'icon-list-alt',
)); ?>

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
    'id'=>'crugestoreduser-form',
    'layout' => TbHtml::FORM_LAYOUT_VERTICAL,
    'enableAjaxValidation'=>false,
    'enableClientValidation'=>false,
    //'htmlOptions' => array('class' => 'well'),
           
)); ?>

<fieldset>
    
    <p class="note"><?php echo Yii::t('traveller', 'Fields with') ?> <span class="required">*</span> <?php echo Yii::t('traveller', 'are required.') ?></p>
    
    <legend>Datos de Cuenta</legend>
    
    <?php echo $form->errorSummary($model); ?>
    
    <div class="row-fluid">
        <div class="span4">
            <p><?php echo Yii::t('traveller','Username')?></p>
            <?php echo $form->textField($model,'username',array('prepend' => '@','disabled' => true,'span'=>12)); ?>
        </div>
        <div class="span4">
            <p><?php echo Yii::t('traveller','Email')?><span class="required"> *</span></p>
            <?php echo $form->textField($model,'email',array('disabled' => true)); ?>
        </div>    
        <div class="span4">
            <p><?php echo Yii::t('traveller','Password')?><span class="required"> *</span></p>
            <?php 
                echo $form->textField($model,'newPassword',
                        array(
                            'append' => TbHtml::ajaxButton("Generar"
                                            ,Yii::app()->user->ui->ajaxGenerateNewPasswordUrl
                                            ,array('success'=>new CJavaScriptExpression('fnSuccess'),
                                                    'error'=>new CJavaScriptExpression('fnError'))
                                        ),
                            'span' => 7,
                            ));//TbHtml::button('Search'))); /*,array('help' => 'La contraseña debe incluir al menos 8 caracteres.')*///) 
            ?>
        </div>        
    </div>  
    <div class="row-fluid">
        <div class="span4">
            <p>Registrado</p>
            <?php //echo $form->textField($model,'regdate',array('disabled' => true)); ?>
            <?php echo TbHtml::textField('text',Yii::app()->format->formatDatetime($model->regdate),array('disabled' => true)); ?>
        </div>
        <div class="span4">
            <p>Último Acceso</p>
            <?php //echo $form->textField($model,'logondate',array('disabled' => true)); ?>
            <?php echo TbHtml::textField('text',Yii::app()->format->formatDatetime($model->logondate),array('disabled' => true)); ?>
        </div>           
    </div>      

    <script>
            function fnSuccess(data){
                    $('#CrugeStoredUser_newPassword').val(data);
            }
            function fnError(e){
                    alert("error: "+e.responseText);
            }
    </script>
    
    <?php if(Yii::app()->user->checkAccess('ventas') || Yii::app()->user->checkAccess('eventour')){ ?>
    
    <legend>Datos de Usuario</legend>
    <?php 
            if(count($model->getFields()) > 0){
                $i = 0;
                    echo "<div class='row-fluid'>";
                    foreach($model->getFields() as $f){
                        if($i == 3){echo "<div class='row-fluid'>"; $i = 0;}
                            //if(($f->fieldname == 'picture') || ($f->fieldname == 'bigpicture')) continue;
                            echo "<div class='span4' id='col_{$f->fieldname}'>";
                            echo "<p>".$f->longname;
                            if($f->required == 1){
                                echo "<span class='required'> *</span></p>";
                            }else { echo "</p>";}
                            echo Yii::app()->user->um->getInputField($model,$f);
                            echo $form->error($model,$f->fieldname);
                            echo "</div>";
                            $i++;
                        if($i == 3){echo "</div>";}    
                    }
                    echo "</div>";
            }
    ?>  
    
    <?php } else if(Yii::app()->user->checkAccess('aliado')){ ?>
    
    <legend>Datos de Afiliado</legend>
    
    <?php echo $form->errorSummary($affiliate); ?>
    
    <div class="row-fluid">
        <div class="span3">
            <p><?php echo Yii::t('traveller','Organizations')?></p>
            <?php echo TbHtml::textField('text',$affiliate->organizationsIdorganization->name,array('disabled' => true)); ?>
        </div>
    </div>    

    <div class="row-fluid">
        <div class="span4">
            <p><?php echo Yii::t('traveller','DNI')?></p>
            <?php echo TbHtml::textField('text',$affiliate->cidnirif,array('disabled' => true)); ?>
        </div>
        <div class="span4">
            <p><?php echo Yii::t('traveller','Names')?><span class="required"> *</span></p>
            <?php echo $form->textField($affiliate, 'names', array('placeholder' => 'Nombres','size' => 60, 'maxlength' => 64)); ?>
        </div>  
        <div class="span4">
            <p><?php echo Yii::t('traveller','Lastnames')?><span class="required"> *</span></p>
            <?php echo $form->textField($affiliate, 'lastnames', array('placeholder' => 'Apellidos','size' => 60, 'maxlength' => 64)); ?>
        </div>                
    </div>    

    <div class="row-fluid">
        <div class="span4">
            <p><?php echo Yii::t('traveller','Birthdate')?></p>
            <?php echo TbHtml::textField('text',$affiliate->birthdate,array('disabled' => true)); ?>        
        </div>              
        <div class="span4">
            <p><?php echo Yii::t('traveller','Phone Hab')?><span class="required"> *</span></p>
            <?php $form->widget(
                'yiiwheels.widgets.maskinput.WhMaskInput',
                array(
                    'model'       => $affiliate,
                    'attribute'   => 'phone_hab',
                    //'name'        => 'phone_hab',
                    'value'       => $affiliate->phone_hab,
                    'mask'        => '+99 (999) 999-9999',
                    'htmlOptions' => array('placeholder' => '+99 (999) 999-9999')
                )
            );?>                 
            <?php //echo $form->textFieldControlGroup($model, 'phone_hab', array('size' => 45, 'maxlength' => 45, 'hint'=>Yii::t('traveller','Hint Phone Hab'))); ?>
        </div>   
        <div class="span4">
            <p><?php echo Yii::t('traveller','Phone Personal')?><span class="required"> *</span></p>
            <?php $form->widget(
                'yiiwheels.widgets.maskinput.WhMaskInput',
                array(
                    'model'       => $affiliate,
                    'attribute'   => 'phone_personal',
                    //'name'        => 'phone_personal',
                    'value'       => $affiliate->phone_personal,
                    'mask'        => '+99 (999) 999-9999',
                    'htmlOptions' => array('placeholder' => '+99 (999) 999-9999')
                )
            );?>                     
            <?php //echo $form->textField($model, 'phone_personal', array('size' => 45, 'maxlength' => 45, 'hint'=>Yii::t('traveller','Hint Phone Personal'))); ?>
        </div>         
    </div>  

    <div class="row-fluid">            
        <div class="span8">
            <p><?php echo Yii::t('traveller','Address')?><span class="required"> *</span></p>
            <?php echo $form->textArea($affiliate, 'address', array('placeholder' => 'Dirección...','size' => 60, 'maxlength' => 128, 'rows'=>5)); ?>  
        </div>
    </div>     

    <legend>Datos de Trabajo</legend>
    
    <div class="row-fluid">
        <div class="span4">
            <p><?php echo Yii::t('traveller','Profession Job')?></p>
            <?php echo $form->textField($affiliate, 'profession_job', array('placeholder' => 'Profesión', 'disabled' => true, 'size' => 60, 'maxlength' => 64)); ?> 
        </div> 
        <div class="span4">
            <p><?php echo Yii::t('traveller','Job')?></p>
            <?php echo $form->textField($affiliate, 'job', array('placeholder' => 'Puesto de trabajo', 'disabled' => true, 'size' => 60, 'maxlength' => 64)); ?>
        </div>   
        <div class="span4">
            <p><?php echo Yii::t('traveller','Departament')?></p>
            <?php echo $form->textField($affiliate, 'departament', array('placeholder' => 'Departamento','size' => 60, 'disabled' => true, 'maxlength' => 64)); ?>
        </div>               
    </div> 

    <div class="row-fluid">           
        <div class="span4">
            <p><?php echo Yii::t('traveller','Phone Office')?><span class="required"> *</span></p>
            <?php $form->widget(
                'yiiwheels.widgets.maskinput.WhMaskInput',
                array(
                    'model'       => $affiliate,
                    'attribute'   => 'phone_office',
                    //'name'        => 'phone_office',
                    'value'       => $affiliate->phone_office,
                    'mask'        => '+99 (999) 999-9999',
                    'htmlOptions' => array('placeholder' => '+99 (999) 999-9999')
                )
            );?>                     
            <?php //echo $form->textField($model, 'phone_office', array('size' => 45, 'maxlength' => 45, 'hint'=>Yii::t('traveller','Hint Phone Office'))); ?>
        </div>  
        <div class="span4">
            <p><?php echo Yii::t('traveller','Phone Referencial')?></p>
            <?php $form->widget(
                'yiiwheels.widgets.maskinput.WhMaskInput',
                array(
                    'model'       => $affiliate,
                    'attribute'   => 'phone_referencial',
                    //'name'        => 'phone_referencial',
                    'value'       => $affiliate->phone_referencial,
                    'mask'        => '+99 (999) 999-9999',
                    'htmlOptions' => array('placeholder' => '+99 (999) 999-9999')
                )
            );?>                    
            <?php //echo $form->textField($model, 'phone_referencial', array('size' => 45, 'maxlength' => 45, 'hint'=>Yii::t('traveller','Hint Phone Referencial'))); ?>
        </div>             
    </div>

    <div class="row-fluid">
        <div class="span8">
            <p><?php echo Yii::t('traveller','Comments')?></p>
            <?php echo $form->textArea($affiliate, 'observations', array('placeholder' => 'Comentarios...','size' => 60, 'maxlength' => 128, 'disabled' => true, 'rows'=>5)); ?>
        </div>             

    </div>        

    <legend>Datos de Contrato</legend>

   <div class="row-fluid">
        <div class="span4">
            <p><?php echo Yii::t('traveller','Payment Cycle')?></p>
            <?php //echo TbHtml::textField('text',$affiliate->payment_cycle,array('disabled' => true)); ?>
            <?php echo $form->dropDownList($affiliate, 'payment_cycle', array(Yii::t('traveller','Select'), 'Quincenal','Mensual'),array('disabled' => true)); ?>
        </div>             
 
        <div class="span4">
            <p><?php echo Yii::t('traveller','Status')?></p>
            <?php echo $form->dropDownList($affiliate, 'status',CHtml::listData(Status::model()->findAll(), 'idstatu','name'),array('disabled' => true)); ?>
        </div>             
    </div>   
    <?php } ?>
    
    </fieldset>

    <?php echo TbHtml::formActions(array(
            TbHtml::submitButton(Yii::t('traveller', 'Save'), array('color' => TbHtml::BUTTON_COLOR_PRIMARY)),
        )); 
    ?>  


<?php $this->endWidget(); ?>
<?php $this->endWidget();?>