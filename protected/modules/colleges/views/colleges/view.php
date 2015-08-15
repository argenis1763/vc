<?php
function displayMajors($majors) { 
	$output = "<ul>\n";
            foreach($majors as $major) {
                    $output .= CHtml::tag('li',array(),$major->name);
            }
	$output .= "</ul>\n";
	return $output;
}
?>
<?php
$this->breadcrumbs=array(
	'Colleges'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/list29.png") . 'Listado de Colleges','url'=>array('index')),
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/plus27.png") . 'Crear College','url'=>array('create')),
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/font2.png") . 'Editar College','url'=>array('update','id'=>$model->id)),
	//array('label'=>'Delete Colleges','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/cogs3.png") . 'Gestionar Colleges','url'=>array('admin')),
);
?>

<legend>Detalle de College #<?php echo $model->id; ?></legend>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'state_id_state' => array(
			'name' => 'stateIdState.name',
			'label' => 'Estado',
		),
		array(               // related services
			'label'=>'Majors',
			'type'=>'raw',
			'value'=>displayMajors($model->majors),
        ),		
	),
)); ?>
