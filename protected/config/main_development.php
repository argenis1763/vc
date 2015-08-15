<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
//Yii::setPathOfAlias('bootstrap', dirname(__FILE__) . '/../extensions/bootstrap');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'timeZone' => 'America/Los_Angeles',
    'name' => 'Via College Online',
    'language' => 'es',
    'theme' => 'via-college',
    'defaultController' => 'site',
    // path aliases
    'aliases' => array(
        // yiistrap configuration
        'bootstrap' => realpath(__DIR__ . '/../extensions/bootstrap'), // change if necessary
        // yiiwheels configuration
        'yiiwheels' => realpath(__DIR__ . '/../extensions/yiiwheels'), // change if necessary
    ),
    // preloading 'log' component
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*', 
        'application.modules.cruge.components.*',
        'application.modules.cruge.extensions.crugemailer.*',
        'bootstrap.helpers.TbHtml',
        'bootstrap.helpers.TbArray',
        'bootstrap.behaviors.TbWidget',
        'bootstrap.widgets.*',
        'bootstrap.components.*',        
    ),
    'modules' => array(
        // uncomment the following to enable the Gii tool
        
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => '1234',
            // If removed, Gii defaults to localhost only. Edit carefully to taste.
            'ipFilters' => array('127.0.0.1', '::1'),
            'generatorPaths' => array('bootstrap.gii'),
        ),
        'cruge' => array(
            'tableprefix' => 'cruge_',
            'availableAuthMethods' => array('default'),
            'availableAuthModes' => array('username','email'),
            'baseUrl' => 'http://'.$_SERVER['SERVER_NAME'],
            'debug' => false,
            'rbacSetupEnabled' => true,
            'allowUserAlways' => true,
            'useEncryptedPassword' => false,
            'hash' => 'md5',
            'afterLoginUrl' => null,
            'afterLogoutUrl' => null,
            'afterSessionExpiredUrl' => null,
            'loginLayout' => '//layouts/column2',
            'registrationLayout' => '//layouts/column2',
            'activateAccountLayout' => '//layouts/column2',
            'editProfileLayout' => '//layouts/column2',
            'resetPasswordLayout' => '//layouts/column2',
            'generalUserManagementLayout' => 'ui',
            'userDescriptionFieldsArray' => array('email')
        ),
        // 1.
        'colleges',
        // 2.
        'majors',
        // 3.
        'forum',
        // 4.
        'calendar',
        // 5.
        'tests',
        // 6.
        'interviews',
        // 7.
        'questionnaire',
        // 8.
        'essays',
        // 9.
        'tracking',
        // 10.
        'students',
        // 11.
        'parents',
        // 12.
        'guides',
        // 13.
        'advices',
        // 14.
        'webapp',
        // 15.
        'geographya',
        // 17.
        'requirements',
        // 18.
		'profile',
		// 19.
		'tutor',
		//20
		'users',
		// 21.
        'user' => array(
            'allowAutoLogin' => true,
            'class' => 'application.modules.cruge.components.CrugeWebUser',
            'loginUrl' => array('/cruge/ui/login'),
        ),
        // 22.
        'authManager' => array(
            'class' => 'application.modules.cruge.components.CrugeAuthManager',
            //'class' => 'application.components.MyCrugeAuthManager',
        ),
        'format' => array(
            'datetimeFormat' => "d M, Y h:m:s a",
        ),
    ),
    // application components
    'components' => array(
        'user' => array(
            'allowAutoLogin' => true,
            'class' => 'application.modules.cruge.components.CrugeWebUser',
            'loginUrl' => array('/cruge/ui/login'),
        ),
        'authManager' => array(
            'class' => 'application.modules.cruge.components.CrugeAuthManager',
        ),
        'swiftmailer' => array(
            'class' => 'application.extensions.swiftmailer.SwiftMailer'
        ),
        'crugemailer' => array(
            'class' => 'application.modules.cruge.components.MiCrugeMailer',
            'mailfrom' => 'admin@via-college.com',
            'subjectprefix' => 'VCO - ',
            'bcc' => '',
            'smtp_user' => 'mail@carlucchese.com',
            'smtp_pwd' => '79qlNx%5',
            'debug' => true,
        ),
        'format' => array(
            'datetimeFormat' => "d M, Y h:m:s a",
        ),
        'cache' => array('class' => 'system.caching.CDummyCache'),
        // uncomment the following to enable URLs in path-format
        'urlManager' => array(
            'urlFormat' => 'path',
            'rules' => array(
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ),
            'showScriptName' => false,
            'caseSensitive' => true,
        ),
        // uncomment the following to use a MySQL database
        'db' => array(
            'connectionString' => 'mysql:host=localhost;dbname=via-college',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '17633498',
            'charset' => 'utf8',
            'tablePrefix' => '',
        ),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        // yiistrap configuration
        'bootstrap' => array(
            //'class' => 'bootstrap.components.Bootstrap',
            'class' => 'bootstrap.components.TbApi',
        ),
        // yiiwheels configuration
        'yiiwheels' => array(
            'class' => 'yiiwheels.YiiWheels',
        ),
        // PDF
        'ePdf' => array(
            'class' => 'application.extensions.yii-pdf.EYiiPdf',
            'params' => array(
                'mpdf' => array(
                    'librarySourcePath' => 'application.vendors.mpdf.*',
                    'constants' => array(
                        '_MPDF_TEMP_PATH' => Yii::getPathOfAlias('application.runtime'),
                    ),
                    'class' => 'mpdf', // the literal class filename to be loaded from the vendors folder
                /* 'defaultParams'     => array( // More info: http://mpdf1.com/manual/index.php?tid=184
                  'mode'              => '', //  This parameter specifies the mode of the new document.
                  'format'            => 'A4', // format A4, A5, ...
                  'default_font_size' => 0, // Sets the default document font size in points (pt)
                  'default_font'      => '', // Sets the default font-family for the new document.
                  'mgl'               => 15, // margin_left. Sets the page margins for the new document.
                  'mgr'               => 15, // margin_right
                  'mgt'               => 16, // margin_top
                  'mgb'               => 16, // margin_bottom
                  'mgh'               => 9, // margin_header
                  'mgf'               => 9, // margin_footer
                  'orientation'       => 'P', // landscape or portrait orientation
                  ) */
                ),
            ),
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',
                ),
            // uncomment the following to show log messages on web pages
            /*
              array(
              'class'=>'CWebLogRoute',
              ),
             */
            ),
        ),
    /*
      'mailer' => array(
      'class' => 'application.extensions.mailer.EMailer',
      'pathViews' => 'application.views.email',
      'pathLayouts' => 'application.views.email.layouts'
      ),
     */
    ),
    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'carloslucchese@gmail.com',
    ),
);
