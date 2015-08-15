<?php
$this->breadcrumbs=array(
	'Majors',
);

$this->menu=array(
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/plus27.png") . 'Crear Major','url'=>array('create')),
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/cogs3.png") . 'Gestión de Majors','url'=>array('admin')),
);
?>

<legend>Majors</legend>

<?php $this->widget('yiiwheels.widgets.grid.WhGridView',array(
        'fixedHeader' => true,
	'headerOffset' => 40,
	'type' => 'striped',
        'responsiveTable' => true,
	'dataProvider'=>$dataProvider,
    'columns'=>array(
                'id',
                'name',
                'description',
                'categories_majors_id'=>array(
                    'name'=>'categories_majors_id',
                    'value'=>'$data->categoriesMajors->name',
                ),/*
                'colleges_id_college'=>array(
                    'name'=>'colleges_id_college',
                    'value'=>'$data->collegesIdCollege->name',
                ),   */
        ),
	//'itemView'=>'_view',
)); ?>
