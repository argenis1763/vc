<?php
/*
	aqui: $this->beginContent('//layouts/main'); indica que este layout se amolda 
	al layout que se haya definido para todo el sistema, y dentro de el colocara
	su propio layout para amoldar a un CPortlet.
	
	esto es para asegurar que el sistema disponga de un portlet, 
	esto es casi lo mismo que haber puesto en UiController::layout = '//layouts/column2'
	a diferencia que aqui se indica el uso de un archivo CSS para estilos predefinidos
	
	Yii::app()->layout asegura que estemos insertando este contenido en el layout que
	se ha definido para el sistema principal.
*/
?>

<?php $this->beginContent('//layouts/'.Yii::app()->layout); 
	if(Yii::app()->user->isSuperAdmin)
		echo Yii::app()->user->ui->superAdminNote();
?>
<div class="container page">
    <div class="row">
        <div class="span12">
            <div class="row">
                <div class="span9">
                    <?php echo $content; ?>
                </div>
                <?php if(Yii::app()->user->checkAccess('admin')) { ?>	
                <div class="span3 last">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <legend>Operaciones</legend>
                        </div>
                        <div class="panel-body">                 
                            <?php
                            $this->widget('bootstrap.widgets.TbNav', array(
                                'type' => TbHtml::NAV_TYPE_LIST, // '', 'tabs', 'pills' (or 'list')
                                'stacked' => false,
                                'items' => Yii::app()->user->ui->adminItems,
                                'htmlOptions' => array('class' => 'well'),
                            ));
                            ?>
                        </div>
                    </div>            
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
    <?php $this->endContent(); ?>