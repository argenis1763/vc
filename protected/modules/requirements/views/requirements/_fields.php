<?php
	$form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
		'id' => 'requirements-form',
		// Please note: When you enable ajax validation, make sure the corresponding
		// controller action is handling ajax validation correctly.
		// There is a call to performAjaxValidation() commented in generated controller code.
		// See class documentation of CActiveForm for details on this.
		'enableAjaxValidation' => false,
		'htmlOptions' => array('enctype' => 'multipart/form-data'),
		'clientOptions' => array(
			'validateOnSubmit' => true,
		),
			));
			
	$nameDiv = array();
	$nameReq = array();
?>

	<div id="errorField" class="alert alert-info alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		Todos los Campos del Requerimiento son necesarios.
	</div>

    <?php echo $form->errorSummary($model); ?>

    <table class="row-fluid">
    
    <?php foreach ($model->requirementsHasRequirementsFields as $id => $requirementsHasRequirementsField) { array_push($nameDiv, $id."editor1"); array_push($nameReq, RequirementsFields::model()->findByPk($requirementsHasRequirementsField->requirements_fields_id)->name);?>

        <script>
        $(document).ready(function(){

                $("#ocultar<?php echo $id;?>").click(function(event){
                    event.preventDefault();
                    $("#description<?php echo $id;?>").hide("slow");
                    $("#ocultar<?php echo $id;?>").hide();
                    $("#mostrar<?php echo $id;?>").show();
                });

                $("#mostrar<?php echo $id;?>").click(function(event){
                    event.preventDefault();
                    $("#description<?php echo $id;?>").show("slow");
                    $("#mostrar<?php echo $id;?>").hide();
                    $("#ocultar<?php echo $id;?>").show(); 
                });

        });
        </script>    
        
        <?php echo Chtml::activeHiddenField($requirementsHasRequirementsField, "[$id]requirements_id"); ?>
	<?php echo Chtml::activeHiddenField($requirementsHasRequirementsField, "[$id]requirements_fields_id"); ?>
		
        <tr><td>
            <legend>
                <!--<a href="#" onclick="$('#description<?php //echo $id; ?>').toggle('slow');"><i class="fa fa-chevron-down"></i></a>-->
                <a href="#" id="mostrar<?php echo $id;?>"><i class="fa fa-chevron-down"></i></a>
                <a href="#" id="ocultar<?php echo $id;?>" style="display: none;"><i class="fa fa-chevron-up"></i></a>
                <?php echo RequirementsFields::model()->findByPk($requirementsHasRequirementsField->requirements_fields_id)->name; ?>
            </legend>    
        </td></tr> 

        <tr><td>   
            <script src="<?php echo Yii::app()->baseUrl.'/ckeditor/ckeditor.js'; ?>"></script>
            <?php 
                if ($requirementsHasRequirementsField->requirements_fields_id != 1){ 
                    /*$this->beginWidget('yiiwheels.widgets.box.WhBox', array(
                            'title' => 'description',
                            'headerIcon' => 'icon-th-list',
                            'headerButtons' => array(
                                            TbHtml::buttonGroup(
                                                    array(
                                                            array(
                                                                    //'id' => 'minMax',
                                                                    'label' => '', 
                                                                    'icon' => 'icon-th-list',
                                                                    'onclick' => "$('#description".$id."').toggle('slow');",
                                                                    ),                 
                                                    )
                                                    //array('toggle' => TbHtml::BUTTON_TOGGLE_CHECKBOX)
                                            ),
                                    ),
                            //'content' => displayStudents($model->students),
                    ));	*/
             ?>
             <div id="description<?php echo $id;?>" style="display: none;">
             <?php    
                echo $form->textArea($requirementsHasRequirementsField, "[$id]description1", array('id' => $id.'editor1','span' => 8, 'rows' => 5)); 				
                /*$this->widget('yiiwheels.widgets.redactor.WhRedactor', array(
                    'model'=>$requirementsHasRequirementsField,
                    'attribute' => "[$id]description1",
                    'pluginOptions'=>array(
                       'lang'=>'es',
                       //'toolbar' => false,
                       'buttons'=>array(
                            'html', 'formatting', 'bold', 'italic', 'deleted',
                            'unorderedlist', 'orderedlist', 'outdent', 'indent',
                            'image', 'video', 'file', 'table', 'link', 'alignment', 'horizontalrule',                            
                           /* 'formatting', '|', 'bold', 'italic', 'deleted', '|',
                            'unorderedlist', 'orderedlist', 'outdent', 'indent', '|',
                            'image', 'video', 'link', '|', 'html',
                       ),
                   ),
                ));*/
            ?>
            </div>
            <?php }?>
            <script type="text/javascript">
                    CKEDITOR.replace( '<?php echo $id;?>editor1', {
                             filebrowserBrowseUrl: '<?php echo Yii::app()->baseUrl; ?>/kcfinder/browse.php?type=files',
                             filebrowserImageBrowseUrl: '<?php echo Yii::app()->baseUrl; ?>/kcfinder/browse.php?type=images',
                             filebrowserFlashBrowseUrl: '<?php echo Yii::app()->baseUrl; ?>/kcfinder/browse.php?type=flash',
                             filebrowserUploadUrl: '<?php echo Yii::app()->baseUrl; ?>/kcfinder/upload.php?type=files',
                             filebrowserImageUploadUrl: '<?php echo Yii::app()->baseUrl; ?>/kcfinder/upload.php?type=images',
                             filebrowserFlashUploadUrl: '<?php echo Yii::app()->baseUrl; ?>/kcfinder/upload.php?type=flash',
							 toolbar: [
								{ name: 'document', items: [ 'Source', '-', 'NewPage', 'Preview', 'Print', '-', 'Templates' ] },	// Defines toolbar group with name (used to create voice label) and items in 3 subgroups.
								[ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo' ],						// Defines toolbar group without name.
								{ name: 'editing', groups: [ 'find', 'selection', 'spellchecker' ], items: [ 'Find', 'Replace', '-', 'SelectAll', '-', 'Scayt' ] },
								//{ name: 'forms', items: [ 'Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField' ] },								
								'/',																					// Line break - next group will be placed in new line.
								{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', '-', 'RemoveFormat' ] },
								{ name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl' ] },
								{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
								{ name: 'insert', items: [ 'Image', 'Table', 'HorizontalRule', 'Smiley', 'SpecialChar', 'PageBreak' ] },
								'/',
								{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
								{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },
								{ name: 'tools', items: [ 'Maximize', 'ShowBlocks' ] },
								{ name: 'others', items: [ '-' ] },
							 ],							 
							 toolbarGroups: [
								{ name: 'document',	   groups: [ 'mode', 'document' ] },			// Displays document group with its two subgroups.
								{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },			// Group's name will be used to create voice label.
								'/',																// Line break - next group will be placed in new line.
								{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
								{ name: 'links' }
							 ],							
                    });
            </script>			
        </td></tr>
        <tr><td>
                   
            <?php if ($requirementsHasRequirementsField->requirements_fields_id == 1) { ?>
			<div id="description<?php echo $id;?>" style="display: none;"> 
				<?php 
					//echo $form->fileFieldControlGroup($requirementsHasRequirementsField, "[$id]description1",array('types' => 'jpeg , jpg')); 					
					echo empty($requirementsHasRequirementsField->description1)? 
						'<div id="image" onclick="openKCFinder(this)"><div style="margin:5px">Click here to choose an image</div></div>' : 
						'<div id="image" onclick="openKCFinder(this)" ><img id="img" src="'. $requirementsHasRequirementsField->description1 .'" /></div>';
				?>
            <br />	
            <p>Seleccionar imagen</p>		
            <?php 
                echo $form->textField($requirementsHasRequirementsField,"[$id]description1",
                        array(
                            'id' => 'nameImage',
                            'append' => TbHtml::button("Subir Image",
                                            array(	
                                                'color' => TbHtml::BUTTON_COLOR_PRIMARY,
                                                'onclick'=>"openKCFinder(image)")
                                                        ),
                            'readonly' => 'readonly',			
                            'span' => 3,
                        ));	
                /*<input id="nameImage" type="text" readonly="readonly"
                        value="Click here and select a file double clicking on it" style="width:600px;cursor:pointer" />	*/
                echo $form->textAreaControlGroup($requirementsHasRequirementsField, "[$id]description1", array('span' => 8, 'rows' => 5));
                /*$this->widget('application.extensions.EAjaxUpload.EAjaxUpload', array(
                        'id' => 'uploadFile',
                        'config' => array(
                                'action' => Yii::app()->createUrl('images/uploads'),
                                'allowedExtensions' => array("jpg", "jpeg"), //array("jpg","jpeg","gif","exe","mov" and etc...
                                'sizeLimit' => 2 * 1024 * 1024, // maximum file size in bytes
                                //'onProgress'=> "js.function(id, fileName, loaded, total){}",
                                //'minSizeLimit'=>10*1024*1024,// minimum file size in bytes
                                //'onComplete'=>"js:function(id, fileName, responseJSON){ alert(fileName); }",
                                //'messages'=>array(
                                //                  'typeError'=>"{file} has invalid extension. Only {extensions} are allowed.",
                                //                  'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
                                //                  'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
                                //                  'emptyError'=>"{file} is empty, please select files again without it.",
                                'onLeave' => "The files are being uploaded, if you leave now the upload will be cancelled.",
                        //                 ),
                        //'showMessage'=>"js:function(message){ alert(message); }",
                        )
                ));*/
            ?>
            </div>
            <?php } ?>
        </td></tr>
        <?php } ?>   
        </table>    
        <div class="form-actions">
            <?php
            echo TbHtml::submitButton($model->isNewRecord ? 'Guardar' : 'Actualizar', array(
                'color' => TbHtml::BUTTON_COLOR_PRIMARY,
                'size' => TbHtml::BUTTON_SIZE_DEFAULT,
            ));
            ?>
        </div>

<?php $this->endWidget(); ?>
<script type="text/javascript">
function openKCFinder(div) {
        window.KCFinder = {
                callBack: function(url) {
                        nameImage.value = url;
                        window.KCFinder = null;
                        div.innerHTML = '<div style="margin:5px">Loading...</div>';
                        var img = new Image();
                        img.src = url;
                        img.onload = function() {
                                div.innerHTML = '<img id="img" src="' + url + '" />';
                                var img = document.getElementById('img');
                                var o_w = img.offsetWidth;
                                var o_h = img.offsetHeight;
                                var f_w = div.offsetWidth;
                                var f_h = div.offsetHeight;
                                if ((o_w > f_w) || (o_h > f_h)) {
                                        if ((f_w / f_h) > (o_w / o_h))
                                                f_w = parseInt((o_w * f_h) / o_h);
                                        else if ((f_w / f_h) < (o_w / o_h))
                                                f_h = parseInt((o_h * f_w) / o_w);
                                        img.style.width = f_w + "px";
                                        img.style.height = f_h + "px";
                                } else {
                                        f_w = o_w;
                                        f_h = o_h;
                                }
                                img.style.marginLeft = parseInt((div.offsetWidth - f_w) / 2) + 'px';
                                img.style.marginTop = parseInt((div.offsetHeight - f_h) / 2) + 'px';
                                img.style.visibility = "visible";
                        }
                }
        };
        window.open('/via-college/kcfinder/browse.php?type=images&dir=images/public',
                'kcfinder_textbox','status=0, toolbar=0, location=0, menubar=0, ' +
                'directories=0, resizable=1, scrollbars=0, width=800, height=600'
        );
}
</script>
<script>
$(function(){
  // validamos los campos del form submits
  $('#requirements-form').submit(function(){
  
		var arr = <?php echo json_encode($nameDiv);?>;
		var arrReq = <?php echo json_encode($nameReq);?>;
		var mensage = "Por favor revise los siguientes campos del <b>Requerimiento</b>, se encuentran sin rellenar:<br />";
		var swich = false;
		//var rq_error = new Array();
		
		// Mostramos los valores del array
		for(var i=0;i<arr.length;i++)
		{
			//Comprobamos si algun editor se encuentra vacio
			if ( CKEDITOR.instances[arr[i]].getData() == '' ){
				//rq_error[0] = arr[i];
				//alert( 'Por favor revise todos los campos, se encuentran\ncampos del Requerimiento sin rellenar ' + rq_error[0] );
				/*alertify.alert("Por favor revise todos los campos, se encuentran campos del <b>Requerimiento</b> sin rellenar:<br /><b>" + arrReq[i] +"</b><br />", function () {
					//aqui introducimos lo que haremos tras cerrar la alerta.
					//por ejemplo -->  location.href = 'http://www.google.es/';  <-- Redireccionamos a GOOGLE.
				});				
				return false;*/
				mensage += "<b>"+ arrReq[i] +"</b><br />";
				swich = true;
			}		
		}

		if(swich)
		{
			alertify.alert(mensage, function () {
				//aqui introducimos lo que haremos tras cerrar la alerta.
				//por ejemplo -->  location.href = 'http://www.google.es/';  <-- Redireccionamos a GOOGLE.
			});		
			return false;
		}
		
  });
});
</script>
