<?php /* @var $this Controller */ ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="../../assets/ico/favicon.ico">
        <?php
        echo Yii::app()->bootstrap->registerAllCss();
        echo Yii::app()->bootstrap->registerCoreScripts();
        ?>
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

<body>

<div class="container" id="page">

	<div id="header">
		
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('bootstrap.widgets.TbNavbar',array(
                        'type'=>'inverse', // null or 'inverse'
                        'brandUrl'=>'#',
                        'collapse'=>true, // requires bootstrap-responsive.css	
                        'items'=>array(
				array(
                                    'class'=>'bootstrap.widgets.TbMenu',
                                    'items'=>array(
                                       //array('url'=>Yii::app()->getModule('user')->loginUrl, 'label'=>'Login', 'visible'=>Yii::app()->user->isGuest),
                                      //  array('url'=>Yii::app()->getModule('user')->registrationUrl, 'label'=>Yii::app()->getModule('user')->t("Register"), 'visible'=>Yii::app()->user->isGuest),
                                       //array('url'=>Yii::app()->getModule('user')->profileUrl, 'label'=>Yii::app()->getModule('user')->t("Profile"), 'visible'=>!Yii::app()->user->isGuest),
                                      //  array('url'=>Yii::app()->getModule('colleges')->collegesUrl, 'label'=>'Colleges', 'visible'=>!Yii::app()->user->isGuest),
                                      //  array('url'=>Yii::app()->getModule('majors')->majorsUrl, 'label'=>'Majors', 'visible'=>!Yii::app()->user->isGuest),
                                       // array('url'=>Yii::app()->getModule('user')->logoutUrl, 'label'=>Yii::app()->getModule('user')->t("Logout").' ('.Yii::app()->user->name.')', 'visible'=>!Yii::app()->user->isGuest),
                                    ),
                                   ),),
		)); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by Via-College.<br/>
		All Rights Reserved.<br/>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
