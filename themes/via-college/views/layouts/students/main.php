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
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/styles.css" />
        <?php
        echo Yii::app()->bootstrap->registerAllCss();
        echo Yii::app()->bootstrap->registerCoreScripts();
        ?>   
        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <body style="background-color:#E7E8EA;">
        <?php
        $this->widget('bootstrap.widgets.TbNavbar', array(
            'type' => 'inverse', // null or 'inverse'
            //'brand'=>'Project name',
            //'brandUrl'=>'#',
            'collapse' => true, // requires bootstrap-responsive.css
            'items' => array(
                array(
                    'class' => 'bootstrap.widgets.TbMenu',
                    'items' => array(
                        array('label' => 'Colleges', 'url' => array('/colleges/colleges/index'), 'class'=>'vcmenu ico',),
                        array('label' => 'Majors', 'url' => array('/majors/majors/index'), 'class'=>'vcmenu ima', 'visible' => !Yii::app()->user->isGuest),
                        array('label' => 'Recursos de Ayuda', 'url' => '#', 'items' => array(
                                array('label' => 'Blog', 'url' => '#'),
                                array('label' => 'Ensayos', 'url' => '#'),
                                array('label' => 'Programas', 'url' => '#'),
                                array('label' => 'Tips', 'url' => '#'),
                                array('label' => 'Videos', 'url' => '#'),
                                '---',
                                array('label' => 'Todos los recursos', 'url' => '#'),
                            )),
                        array('label' => 'Contáctanos', 'url' => array('/site/contact')),
                    ),
                ),
                array(
                    'class' => 'bootstrap.widgets.TbMenu',
                    'htmlOptions' => array('class' => 'pull-right'),
                    'items' => array(
                        array('label' => 'Logout (' . Yii::app()->user->name . ')', 'url' => array('/cruge/ui/login/logout'), 'visible' => !Yii::app()->user->isGuest),
                        array('label' => 'Registro (' . Yii::app()->user->name . ')', 'url' => array('/cruge/ui/registration'), 'visible' => Yii::app()->user->isGuest),
                        array('label' => 'Administrar Usuarios'
                            , 'url' => Yii::app()->user->ui->userManagementAdminUrl
                            , 'visible' => !Yii::app()->user->isGuest),
                        array('label' => 'Login'
                            , 'url' => Yii::app()->user->ui->loginUrl
                            , 'visible' => Yii::app()->user->isGuest),
                        array('label' => 'Logout (' . Yii::app()->user->name . ')'
                            , 'url' => Yii::app()->user->ui->logoutUrl
                            , 'visible' => !Yii::app()->user->isGuest),
                    //),
                    ),
                ),
            ),
        ));
        ?>


        <div class="container" id="page">

            <?php if (isset($this->breadcrumbs)): ?>
                <?php
                $this->widget('bootstrap.widgets.TbBreadcrumbs', array(
                    'links' => $this->breadcrumbs,
                ));
                ?><!-- breadcrumbs -->
            <?php endif ?>

<?php echo $content; ?>

            <div class="clear"></div>

            <div id="footer">
                Copyright &copy; <?php echo date('Y'); ?> by Via College.<br/>
                Todos los derechos reservados.<br/>
            </div><!-- footer -->

        </div><!-- page -->

    </body>
</html>