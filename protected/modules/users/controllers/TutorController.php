<?php

class TutorController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			array('CrugeAccessControlFilter'), // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','buscarStudents','remove'),
				'roles' => array('Analista_I', 'College'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('admin','create','update','delete'),
				'roles' => array('College'),
			),
			array('deny',  // deny all users
				'roles' => array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		if(isset($_POST['idProfile']) && isset($_POST['idTutor']))
		{		
			if(!empty($_POST['idProfile']) && !empty($_POST['idTutor']))
			{
				/*echo "<pre>";
				echo print_r($_POST);
				echo "</pre>";
				Yii::app()->end();*/
				
				$model = Students::model()->find('profile_id='.$_POST['idProfile']);
				$model->tutor_id = $_POST['idTutor'];
				
				if ($model->save()) {
					Yii::app()->user->setFlash('save','El Estudiante se ha agregado correctamente.');				
					$this->redirect(array('view','id'=>$model->tutor_id));
				}
			}
			Yii::app()->user->setFlash('error','Debe seleccionar un Estudiante.');
			$this->redirect(array('view','id'=>$_POST['idTutor']));				   
		}	
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Tutor;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Tutor'])) {
			$model->attributes=$_POST['Tutor'];
			if ($model->save()) {
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if (isset($_POST['Tutor'])) {
			$model->attributes=$_POST['Tutor'];
			if ($model->save()) {
				$this->redirect(array('view','id'=>$model->id));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if (Yii::app()->request->isPostRequest) {
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if (!isset($_GET['ajax'])) {
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
			}
		} else {
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		}
	}
	
	public function actionRemove($id)
	{
		if (Yii::app()->request->isPostRequest) {
			// we only allow deletion via POST request
			//$this->loadModel($id)->delete();
			$model = Students::model()->findByPk($id);
			
			$model->tutor_id = null;
			
			if($model->save())
				Yii::app()->user->setFlash('remove','El Estudiante se ha removido correctamente.');
				$this->redirect(array('view','id'=>$_POST['idx']));
				//$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		} else {
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
		}
	}	

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Tutor');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Tutor('search');
		$model->unsetAttributes();  // clear any default values
		if (isset($_GET['Tutor'])) {
			$model->attributes=$_GET['Tutor'];
		}

		$this->render('admin',array(
			'model'=>$model,
		));
	}
	
	/*public function actionBuscarStudents() {
		if(Yii::app()->request->isAjaxRequest && isset($_GET['q'])) {
			$searched = $_GET['q'];
			$criteria = new CDbCriteria;
			$criteria->condition = "firstname LIKE :searched OR secondname LIKE :searched OR lastname1 LIKE :searched OR lastname2 LIKE :searched OR identification LIKE :searched";
			$criteria->params = array(":searched"=>"%$searched%");
			$profiles = Profile::model()->findAll($criteria);	
			
			$id = $_GET['id'];
			$returnVal = '';
			foreach($profiles as $profile) {
				$is_tutor = Tutor::model()->find('profile_id='.$profile->id_profile)? true : false;
				$is_padre = Parents::model()->find('profile_id='.$profile->id_profile)? true : false;
				$active = Yii::app()->user->um->loadUserById($profile->cruge_user_iduser)->state;
				$has_tutor = Students::model()->find('profile_id='.$profile->id_profile.' AND tutor_id='.$id)? true : false;			
			
				if(!$is_tutor && !$is_padre && !$has_tutor && $active==1){
					$returnVal .= ucwords($profile->identification." ".$profile->firstname." ".$profile->secondname." ".$profile->lastname1." ".$profile->lastname2
									.'|'.$profile->id_profile.'|'.$profile->identification.'|'.$profile->firstname." ".$profile->secondname.'|'.$profile->lastname1." ".$profile->lastname2.'|'.$profile->email."\n");
				}
			}
			echo $returnVal;
		}
	}	*/

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Tutor the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Tutor::model()->findByPk($id);
		if ($model===null) {
			throw new CHttpException(404,'The requested page does not exist.');
		}
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Tutor $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if (isset($_POST['ajax']) && $_POST['ajax']==='tutor-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}