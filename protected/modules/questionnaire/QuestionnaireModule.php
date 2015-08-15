<?php

class QuestionnaireModule extends CWebModule
{
	public $medicalAdminUrl = array('/questionnaire/questionnairesmedicalfields/admin');
        public $parentsAdminUrl = array('/questionnaire/questionnairesparentsfields/admin');
        public $studentsAdminUrl = array('/questionnaire/questionnairesstudentsfields/admin');
        public $indexUrl = array('/questionnaire/questionnaires/');
        public function init()
	{
		// this method is called when the module is being created
		// you may place code here to customize the module or the application

		// import the module-level models and components
		$this->setImport(array(
			'questionnaire.models.*',
			'questionnaire.components.*',
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
