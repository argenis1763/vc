<?php
/* @var $this EssaysController */
/* @var $model Essays */
?>

<?php
$this->breadcrumbs = array(
    'Essays' => array('index'),
    $model->title,
);

$this->menu = array(
    //array('label' => CHtml::image(Yii::app()->theme->baseUrl . "/img/operaciones/list29.png") . 'Listado Essays', 'url' => array('index')),
    array('label' => CHtml::image(Yii::app()->theme->baseUrl . "/img/operaciones/plus27.png") . 'Crear Essay', 'url' => array('create')),
    //array('label'=>'Update Essays', 'url'=>array('update', 'id'=>$model->id_essays)),
    //array('label'=>'Delete Essays', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_essays),'confirm'=>'Are you sure you want to delete this item?')),
    array('label' => CHtml::image(Yii::app()->theme->baseUrl . "/img/operaciones/cogs3.png") . 'Gestión de Essays', 'url' => array('admin')),
);
?>

<legend>Vista de Essay #<?php echo $model->id_essays; ?></legend>

<?php
$this->widget('zii.widgets.CDetailView', array(
    'htmlOptions' => array(
        'class' => 'table table-striped table-condensed table-hover',
    ),
    'data' => $model,
    'attributes' => array(
        'id_essays',
        'colleges_has_majors_colleges_id' => array(
            'name' => 'colleges_has_majors_colleges_id',
            'value' => $model->getNameCollegeEssay($model->colleges_has_majors_colleges_id),
        ),
        'colleges_has_majors_majors_id' => array(
            'name' => 'colleges_has_majors_majors_id',
            'value' => $model->getNameMajorEssay($model->colleges_has_majors_majors_id),
        ),
        'type_essay_id' => array(
            'name' => 'type_essay_id',
            'value' => $model->typeEssay->name,
        ),
        'title',
        'file_name',
        'regdate' => array(
            'name' => 'regdate',
            'type' => 'datetime',
        ),
        'update' => array(
            'name' => 'update',
            'type' => 'datetime',
        ),
    ),
));
?>
<legend>
    <a href="#" id="mostrarAdd" style="display: none;"><i class="fa fa-chevron-down"></i></a>
    <a href="#" id="ocultarAdd"><i class="fa fa-chevron-up"></i></a>
    Agregar Estudiante a Essay
</legend>
<div id="informacion">
    <?php
	
	if(Yii::app()->user->hasFlash('save')){ 
		echo TbHtml::alert(TbHtml::ALERT_COLOR_SUCCESS, Yii::app()->user->getFlash('save'));		
	}else if(Yii::app()->user->hasFlash('error')){
		echo TbHtml::alert(TbHtml::ALERT_COLOR_ERROR, Yii::app()->user->getFlash('error'));
	}else if(Yii::app()->user->hasFlash('remove')){	
		echo TbHtml::alert(TbHtml::ALERT_COLOR_SUCCESS, Yii::app()->user->getFlash('remove'));
	}	

    $data = Profile::model()->crearArrayStudentsEssay($model->id_essays);
    if (empty($data)) {
        echo TbHtml::muted('No hay Estudiantes disponibles para asignar,' . TbHtml::b(' ya todos los Estudiantes activos se encuentran asignados al Essay.'));
        echo "<br />";
    } else {
        ?>

        <!-- Form agregar Students a Essay -->
            <?php echo TbHtml::beginFormTb(TbHtml::FORM_LAYOUT_INLINE); ?>
        <fieldset>

            <?php
            /* $this->widget('CAutoComplete',
              array(
              'name'=>'studentsEssay',
              'url'=>CHtml::normalizeUrl(array('/essays/essays/buscarStudents')),
              'extraParams'=>array('id'=>$model->id_essays),
              'htmlOptions'=>array(
              'size'=>50,
              'maxlength'=>50,
              'span'=>5,
              ),
              'methodChain'=>'.result(function(event,item){
              $("#idProfile").val(item[1]);
              $("#cidni").val(item[2]);
              $("#names").val(item[3]);
              $("#lastnames").val(item[4]);
              $("#email").val(item[5]);
              })'
              )
              ); */
            ?>
            <p>Estudiante:
                <?php
                $this->widget('yiiwheels.widgets.select2.WhSelect2', array(
                    'name' => 'idProfile',
                    'asDropDownList' => true,
                    'data' => $data,
                    'pluginOptions' => array(
                        'allowClear' => true,
                        'minimumInputLength' => 1,
                        'removed' => true,
                        'width' => '50%',
                    ),
                    'htmlOptions' => array(
                        'prompt' => 'Seleccione un Estudiante...',
                )));
                ?>	
            </p>
            <br />					
            Fecha de Inicio:	<div class="input-append">
                <?php
                $this->widget('yiiwheels.widgets.datepicker.WhDatePicker', array(
                    'name' => 'stardate',
                    'value' => date('Y-m-d'),
                    'pluginOptions' => array(
                        'format' => 'yyyy-mm-dd', //'dd/mm/yyyy',									
                        'language' => 'es',
                    ),
                    'htmlOptions' => array(
                        'placeholder' => 'Seleccione fecha',
                        'readonly' => 'readonly',
                        'required' => true,
                    ),
                ));
                ?>	
                <span class="add-on"><icon class="icon-calendar"></icon></span>
            </div>						

            Fecha de Culminación: <div class="input-append">
                <?php
                $this->widget('yiiwheels.widgets.datepicker.WhDatePicker', array(
                    'name' => 'enddate',
                    'pluginOptions' => array(
                        'format' => 'yyyy-mm-dd', //'dd/mm/yyyy',
                        'language' => 'es',
                    ),
                    'htmlOptions' => array(
                        'placeholder' => 'Seleccione fecha',
                        'readonly' => 'readonly',
                        'required' => true,
                    ),
                ));
                ?>
                <span class="add-on"><icon class="icon-calendar"></icon></span>
            </div>		

            <?php //echo CHtml::hiddenField('idProfile'); ?>
            <?php echo CHtml::hiddenField('idEssay', $model->id_essays); ?>
            <br />
            <br />
            <?php echo TbHtml::submitButton('Agregar Estudiante', array('block' => true, 'color' => TbHtml::BUTTON_COLOR_PRIMARY, 'size' => TbHtml::BUTTON_SIZE_LARGE));
            ?>		
    <?php /* echo TbHtml::submitButton('Agregar Estudiante',array(
      'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
      'size'=>TbHtml::BUTTON_SIZE_DEFAULT,
      )); */ ?>	

        </fieldset>
        <?php echo TbHtml::endForm(); ?><!-- form -->
        <hr>

        <!-- Informaci?n del Estudiante -->
        <!--C.I./D.N.I: <?php /* echo TbHtml::textField('cidni', '',
          array('readonly'=>'readonly', 'size' => TbHtml::INPUT_SIZE_SMALL)); ?>
          <br />
          <!--Nombres:	<?php echo TbHtml::textField('names', '',
          array('readonly'=>'readonly', 'size' => TbHtml::INPUT_SIZE_DEFAULT)); ?>
          Apellidos:	<?php echo TbHtml::textField('lastnames', '',
          array('readonly'=>'readonly', 'size' => TbHtml::INPUT_SIZE_DEFAULT)); ?>
          Correo:-->		<?php echo TbHtml::textField('email', '',
          array('readonly'=>'readonly', 'size' => TbHtml::INPUT_SIZE_DEFAULT)); */ ?>					
        <!-- End Informaci?n del Estudiante -->
<?php } ?>	
</div>
<!-- Box de Essays Asignados -->
<?php
$this->beginWidget('yiiwheels.widgets.box.WhBox', array(
    'title' => 'Estudiantes Asignados al Essay',
    'headerIcon' => 'icon-th-list',
        /* 'headerButtons' => array(
          TbHtml::buttonGroup(
          array(
          array(
          'label' => 'Asignar Essay a estudiante',
          'onclick' => '$("#myModal").dialog("open"); return false;'),
          )
          ),
          ), */
        //'content' => displayStudents($model->students),
));
?>

<?php
$dataProvider = new CActiveDataProvider('Students', array(
    'criteria' => array(
        'condition' => 'EXISTS (SELECT * FROM essays_has_cruge_user WHERE students_id = id AND essays_id= :id)',
        'params' => array(':id' => $model->id_essays),
    ),
        ));

$this->widget('yiiwheels.widgets.grid.WhGridView', array(
    'fixedHeader' => true,
    'headerOffset' => 40,
    'type' => 'striped',
    'dataProvider' => $dataProvider,
    'responsiveTable' => true,
    'template' => "{items}",
    'columns' => array(
        'id',
        array(
            'header' => 'Nº de Identidad',
            'value' => '$data->profile->identification',
        ),
        array(
            'name' => 'Nombre',
            'value' => function($data, $row) {
        return Profile::model()->nombreApellido($data->profile->firstname, $data->profile->secondname, $data->profile->lastname1, $data->profile->lastname2);
    },
        ),
        array(
            'header' => 'Sexo',
            'value' => function($data, $row) {
        return Profile::model()->validarSexo($data->profile->sex);
    },
            'type' => 'raw',
        ),
        array(
            'header' => 'Correo',
            'value' => '$data->profile->email',
        ),
        array(
            'header' => 'Status',
            'type' => 'raw',
            'value' => function($data, $row) {
        return Profile::model()->validarStatus($data->profile->cruge_user_iduser);
    },
        ),
        array(
            'header' => '',
            'type' => 'raw',
            'value' => "TbHtml::submitButton('Remover',array(
                        'submit'=>array('remove','id'=>" . '$data->id' . "),
						'params'=>array('idx'=>$model->id_essays),
						'confirm'=>'Desea remover al estudiante del Essay?',
                        'color'=>TbHtml::BUTTON_COLOR_DANGER,
                        'size'=>TbHtml::BUTTON_SIZE_MINI,
                    ))",
        ),
    /* array(
      'name' => '',
      'type' => 'raw',
      'value' => "CHtml::link('Ver / Generar PDF',
      array('requirements/report/idr/$model->id_essay/ids/$student->id'),
      array('target'=>'_blank'))",
      'value' => "CHtml::link('Ver PDF',
      array('generate/index', array('idr' => '[$model->id]', 'ids' => '[$student->id]')),
      array('target'=>'_blank'))", */
    //),
    ),
));
?>

<?php $this->endWidget(); ?>
<!-- End Box de Essays Asignados -->
<script>
    $(document).ready(function() {

        $("#ocultarAdd").click(function(event) {
            event.preventDefault();
            $("#informacion").hide("slow");
            $("#ocultarAdd").hide();
            $("#mostrarAdd").show();
        });

        $("#mostrarAdd").click(function(event) {
            event.preventDefault();
            $("#informacion").show("slow");
            $("#mostrarAdd").hide();
            $("#ocultarAdd").show();
        });

    });
</script> 