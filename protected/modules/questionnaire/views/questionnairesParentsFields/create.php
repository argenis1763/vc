<?php
$this->breadcrumbs=array(
	'Cuestionario para padres'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/plus27.png") . 'Listado','url'=>array('index')),
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/cogs3.png") . 'Gestionar Cuestionarios','url'=>array('admin')),
        array('label' => 'Volver', 'url' => Yii::app()->getModule('questionnaire')->indexUrl),
);
?>


<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>