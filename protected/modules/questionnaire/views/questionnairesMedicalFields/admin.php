<?php
$this->breadcrumbs = array(
    'Cuestionario para antecedentes de salud' => array('index'),
    'Gestionar',
);

$this->menu = array(
    array('label' => CHtml::image(Yii::app()->theme->baseUrl . "/img/operaciones/list29.png") . 'Listado', 'url' => array('index')),
    array('label' => CHtml::image(Yii::app()->theme->baseUrl . "/img/operaciones/plus27.png") . 'Crear Cuestionario', 'url' => array('create')),
    array('label' => 'Volver', 'url' => Yii::app()->getModule('questionnaire')->indexUrl),
);
?>

<legend>Cuestionario para antecedentes de salud</legend>


<?php
$this->widget('application.extensions.tablesorter.Sorter', array(
    /* 'id'=>'questionnaires-medical-fields-grid',
      'dataProvider'=>$model->search(),
      'filter'=>$model, */
    'data' => $model,
    'columns' => array(
        'id',
        'as1',
        'as2',
        'as2_indicate',
        'as3_hearing',
        'as4_visual',
    /*
      'as5_dreams_or_sleep',
      'as6_practices_sport',
      'as7_lost_memory',
      'as8',
      'as9',
      'as10',
      'as11',
      'questionnaires_id',

      array(
      'class'=>'bootstrap.widgets.TbButtonColumn',
      ), */
    ),
    'filters' => array(
        '',
        '',
        '',
        '',
        '',
        '',
    ),
));
?>
