<?php
/* @var $this AffiliatesController */
/* @var $model Affiliates */
?>

<h1><?php echo CHtml::encode(Yii::app()->name); ?> <i><small><?php echo Yii::t('traveller','Profile'); ?></small></i></h1>
<ol class="breadcrumb">
  <li class="active"><i class="fa fa-edit"></i> <?php echo Yii::t('traveller','Profile'); ?></li>
</ol>
<div class="alert alert-info alert-dismissable">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  Plataforma web en internet <a class="alert-link" href="#">http://eventourtravel.com</a>
</div>

<?php Yii::app()->user->checkAccess('aliado')? 
                    $this->renderPartial('_editProfile', array('model'=>$model,'affiliate' => Affiliates::model()->findByPk(Yii::app()->user->name))) : $this->renderPartial('_editProfile', array('model'=>$model));  ?>