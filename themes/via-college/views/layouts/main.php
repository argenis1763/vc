<?php /* @var $this Controller */ ?>
<?php Yii::app()->bootstrap->register(); ?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <script src="http://repository.chatwee.com/scripts/8c69367ad15e8af793cdff5889c9e361.js" type="text/javascript" charset="UTF-8"></script>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="shortcut icon" href="../../assets/ico/favicon.ico">

		<!-- JQuery Alertify -->
		<script src="<?php echo Yii::app()->theme->baseUrl; ?>/js/alertify/lib/alertify.js"></script>
		<!-- JQuery CkEditor -->
		<script language="javascript" type="text/javascript" src="<?php echo Yii::app()->baseUrl.'/ckeditor/ckeditor.js'; ?>"></script>
		
		<!-- Icon font-awesome -->
		<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/font-awesome/css/font-awesome.min.css">
		
        <!-- Core CSS  -->
        <?php Yii::app()->bootstrap->register(); ?>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/via-college.css" />
		<!-- Core CSS Alertify -->
		<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/js/alertify/themes/alertify.core.css" />
		<link rel="stylesheet" href="<?php echo Yii::app()->theme->baseUrl; ?>/js/alertify/themes/alertify.default.css" />			
		
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>
    <body>
        <?php
        $this->widget('bootstrap.widgets.TbNavbar', array(
            'brandLabel' => 'Via-College Online',
            //'display' => null, // default is static to top
            'items' => array(
                array(
                    'class' => 'bootstrap.widgets.TbNav',
                    'htmlOptions' => array('class' => 'navbar-right'),
                    'items' => array(
                        array('label' => 'Essays', 'url' =>Yii::app()->getModule('essays')->studentUrl,
                            'visible' => Yii::app()->user->checkAccess('Estudiante') OR Yii::app()->user->checkAccess('Tutor')),
                        array('label' => 'Colleges', 'url' => Yii::app()->getModule('colleges')->indexUrl,
                            'visible' => Yii::app()->user->checkAccess('College')),
                        array('label' => 'Majors', 'url' => Yii::app()->getModule('majors')->indexUrl,
                            'visible' => Yii::app()->user->checkAccess('College')),
                        array('label' => 'Requirements', 'url' => Yii::app()->getModule('requirements')->createUrl,
                            'visible' => Yii::app()->user->checkAccess('College')),
                        //array('label' => 'Cuestionarios', 'url' => Yii::app()->getModule('questionnaire')->indexUrl,
                            //'visible' => Yii::app()->user->checkAccess('College')),
                        array('label' => 'Administrador',
                            'htmlOptions' => array('class' => 'navbar-right'),
                            'items' => Yii::app()->user->ui->getAdminItems(),
                            'visible' => Yii::app()->user->checkAccess('College')),
                        array('label' => 'Registro (' . Yii::app()->user->name . ')', 'url' => array('/users/users/registrate'), 'visible' => Yii::app()->user->isGuest),
                        array('label' => 'Entrar', 'url' => Yii::app()->user->ui->loginUrl,
                            'visible' => Yii::app()->user->isGuest),
                        array('label' => 'Salir (' . Yii::app()->user->name . ')'
                            , 'url' => Yii::app()->user->ui->logoutUrl
                            , 'visible' => !Yii::app()->user->isGuest),						
                    ),
                ),
            //),
            ),
        ));
        ?>

        <?php echo $content; ?>

        <div class="container">
            <div class="row clearfix">
                <div class="span12">
                    <strong><br /><br />Copyright &copy; <?php echo date('Y'); ?> by Via College.</strong><br />  Todos los derechos reservados.<br />
                    <br /><br /></div>
            </div>
        </div>
        <?php // echo Yii::app()->user->ui->displayErrorConsole(); ?>
    </body>
</html>