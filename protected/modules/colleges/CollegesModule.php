<?php
Yii::import('application.modules.geographya.models.*');
Yii::import('application.modules.majors.models.*');
class CollegesModule extends CWebModule
{
	//public $adminUrl = array('/colleges/colleges/admin');
        public $indexUrl = array('/colleges/colleges/');
        public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'colleges.models.*',
			'colleges.components.*',
		));
	}

	public function beforeControllerAction($controller, $action)
	{
		if(parent::beforeControllerAction($controller, $action))
		{
			// this method is called before any module controller action is performed
			// you may place customized code here
			return true;
		}
		else
			return false;
	}
}
