<?php
Yii::import('application.modules.colleges.models.*');
Yii::import('application.modules.majors.models.*');
Yii::import('application.modules.students.models.*');
Yii::import('application.modules.profile.models.*');
Yii::import('application.modules.tutor.models.*');
Yii::import('application.modules.parents.models.*');
class EssaysModule extends CWebModule
{
	public $indexUrl = array('/essays/essays');
        public $studentUrl = array('/essays/essayStudents');
        public $tutorUrl = array('/essays/essayStudents');
        public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'essays.models.*',
			'essays.components.*',
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
