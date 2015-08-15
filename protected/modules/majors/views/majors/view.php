<?php
function displayColleges($colleges) { 
	$output = "<ul>\n";
            foreach($colleges as $college) {
                    $output .= CHtml::tag('li',array(),$college->name);
            }
	$output .= "</ul>\n";
	return $output;
}
?>
<?php
$this->breadcrumbs=array(
	'Majors'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/list29.png") . 'Listado de Majors','url'=>array('index')),
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/plus27.png") . 'Crear Major','url'=>array('create')),
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/font2.png") . 'Editar Major','url'=>array('update','id'=>$model->id)),
	//array('label'=>'Eliminar Major','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>CHtml::image(Yii::app()->theme->baseUrl."/img/operaciones/cogs3.png") . 'Gestión de Major','url'=>array('admin')),
);
?>

<legend>Vista del Major #<?php echo $model->id; ?></legend>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'description',		
		'categories_majors_id'=> array(
			'name' => 'categoriesMajors.name',
			'label' => 'Categoría',
		),
		array(               // related services
			'label'=>'Colleges',
			'type'=>'raw',
			'value'=>displayColleges($model->colleges),
        ),		
	),
)); ?>
