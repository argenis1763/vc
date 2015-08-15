<?php
$this->breadcrumbs=array(
	'Colleges',
);

$this->menu=array(
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/plus27.png") . 'Crear College','url'=>array('create')),
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/cogs3.png") . 'Gestión de  Colleges','url'=>array('admin')),
);
?>

<legend>Colleges</legend>

<?php $this->widget('yiiwheels.widgets.grid.WhGridView',array(
        'fixedHeader' => true,
        'headerOffset' => 40,
        'type' => 'striped',
        'responsiveTable' => true,
	'dataProvider'=>$dataProvider,
        'columns'=>array(
                    'id',                    
                    'name',
                    'state_id_state'=>array(
                        'name'=>'state_id_state',
                        'value'=>'$data->stateIdState->name',
                    ),
            ),
	//'itemView'=>'_view',
)); ?>
