<?php

class RequirementsController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @var CActiveRecord the currently loaded data model instance.
     */
    private $_model;

    /**
     * @return array action filters
     */
    public function filters() {
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
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view', 'admin', 'create', 'update', 'load', 'report'),
                'roles' => array('Analista_I', 'College'),
            ),
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index'),
                'roles' => array('Aliado', 'College'),
            ),
            array('deny', // deny all users
                'roles' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        //$student = new Students;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['idProfile']) && isset($_POST['idRequirement'])) {
		
            //$student->attributes = $_POST['Students'];
            //$student->requirements_id = $id;
			if(!empty($_POST['idProfile']) && !empty($_POST['idRequirement']))
			{
				/*echo "<pre>";
				echo print_r($_POST);
				echo "</pre>";
				Yii::app()->end();*/
				
				$model = Students::model()->find('profile_id='.$_POST['idProfile']);
				$model->requirements_id = $_POST['idRequirement'];
				
				if ($model->save()) {
					Yii::app()->user->setFlash('save','El Estudiante se ha agregado correctamente.');				
					//$this->redirect(array('view','id'=>$model->tutor_id));
					$this->redirect(array('requirements/report', 'idr' => $id, 'ids' => $model->id));
				}
			}
			Yii::app()->user->setFlash('error','Debe seleccionar un Estudiante.');
			$this->redirect(array('view','id'=>$_POST['idRequirement']));	
			
            /*if ($student->save())
                $this->redirect(array('requirements/report', 'idr' => $id, 'ids' => $student->id));*/
        }

        $this->render('view', array(
            'model' => $this->loadModel($id)//, 'students' => $student,
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Requirements;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Requirements']) && isset($_POST['requirementsFields'])) {
            $model->attributes = $_POST['Requirements'];
            // Set relations attributs values
            $model->setRelationRecords('requirementsFields', is_array(@$_POST['requirementsFields']) ? $_POST['requirementsFields'] : array());
            if ($model->save())
                $this->redirect(array('load', 'id' => $model->id));
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    public function actionAssign($id) {
        $student = new Students;

        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Students'])) {

            if ($student->save())
            //$this->redirect(array('view','id'=>$model->id));
                $this->redirect(array('requirements/report', 'idr' => $id, 'ids' => $student->id));
        }

        $this->render('assign', array(
            'model' => $model, 'student' => $student,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Requirements'])) {
            $model->attributes = $_POST['Requirements'];
            $model->setRelationRecords('requirementsFields', is_array(@$_POST['requirementsFields']) ? $_POST['requirementsFields'] : array());
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    public function actionLoad($id) {
        $model = $this->loadModel($id);
		
		$_SESSION['KCFINDER']['disabled'] = false; // enables the file browser in the admin
		$_SESSION['KCFINDER']['uploadURL'] = Yii::app()->baseUrl."/uploads/"; // enables the file browser in the admin
		$_SESSION['KCFINDER']['uploadDir'] = Yii::app()->basePath."/../uploads/"; // enables the file browser in the admin		

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['RequirementsHasRequirementsFields'])) {
            /* echo "<pre>";
              echo print_r($_POST);
              echo "</pre>";
              Yii::app()->end(); */
            //$model->attributes=$_POST['Requirements'];
            $model->setRelationRecords('requirementsHasRequirementsFields', is_array(@$_POST['RequirementsHasRequirementsFields']) ? $_POST['RequirementsHasRequirementsFields'] : array());
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('load', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        } else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

	public function actionRemove($id)
	{
		if (Yii::app()->request->isPostRequest) {
			// we only allow deletion via POST request
			//$this->loadModel($id)->delete();
			$model = Students::model()->findByPk($id);
			
			$model->requirements_id = null;
			
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
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Requirements');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Requirements('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Requirements']))
            $model->attributes = $_GET['Requirements'];
        //$model = Requirements::model()->findAll();
        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     *
      public function loadModel($id)
      {
      $model=Requirements::model()->findByPk($id);
      if($model===null)
      throw new CHttpException(404,'The requested page does not exist.');
      return $model;
      }
     */

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     */
    public function loadModel($id) {
        if ($this->_model === null) {
            if (isset($_GET['id']))
                $this->_model = Requirements::model()->findByPk($id);
            if ($this->_model === null)
                throw new CHttpException(404, 'The requested page does not exist.');
        }
        return $this->_model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'requirements-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionUpload() {
        Yii::import("application.extensions.EAjaxUpload.qqFileUploader");

        $folder = 'images/uploads/'; // folder for uploaded files
        $allowedExtensions = array("jpg", "jpeg"); //array("jpg","jpeg","gif","exe","mov" and etc...
        $sizeLimit = 2 * 1024 * 1024; // maximum file size in bytes
        $uploader = new qqFileUploader($allowedExtensions, $sizeLimit);
        $result = $uploader->handleUpload($folder);
        $return = htmlspecialchars(json_encode($result), ENT_NOQUOTES);

        $fileSize = filesize($folder . $result['filename']); //GETTING FILE SIZE
        $fileName = $result['filename']; //GETTING FILE NAME

        echo $return; // it's array    
    }

    public function actionReport() {

        // Generar un archivo PDF
        # mPDF
        $mPDF1 = Yii::app()->ePdf->mpdf();

        # You can easily override default constructor's params
        $mPDF1 = Yii::app()->ePdf->mpdf('', 'Letter');
        # render (full page)
        $mPDF1->WriteHTML($this->renderPartial('report', true));
        # Load a stylesheet
        //$stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/ett.css');
        //$mPDF1->WriteHTML($stylesheet, 1);

        # Outputs ready PDF
        $mPDF1->Output();
    }

}
