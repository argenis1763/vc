<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	$this->module->id,
);
?>
<h1><?php echo $this->uniqueId . '/' . $this->action->id; ?></h1>
    <?php
    $this->widget('yiiwheels.widgets.select2.WhSelect2', array(
    'asDropDownList' => false,
    'name' => 'select2test',
    'pluginOptions' => array(
    'tags' => array('Major 1','Major 2', 'Major 3', 'Major 4'),
    'placeholder' => 'Selecciona los Majors para el estudiante',
    'width' => '40%',
    'tokenSeparators' => array(',', ' ')
    )));
    ?>


<?php
$this->widget('yiiwheels.widgets.multiselect.WhMultiSelect', array(
'name' => 'multiselecttest',
'data' => array(
'Major 1','Major 2', 'Major 3', 'Major 4'
)
));
?>