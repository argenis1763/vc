<?php

class EssaysController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

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
                'actions' => array('index', 'view', 'admin', 'create', 'update', 'load', 'report', 'remove', 'cargarMajor', 'buscarStudents', 'Generate'),
                'roles' => array('Analista_I', 'College'),
            ),
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('list'),
                'roles' => array('Aliado', 'College', 'Tutor'),
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
        if (isset($_POST['idProfile']) && isset($_POST['idEssay']) && isset($_POST['stardate']) && isset($_POST['enddate'])) {
            if (!empty($_POST['idProfile']) && !empty($_POST['idEssay']) && !empty($_POST['stardate']) && !empty($_POST['enddate'])) {

                $essay = $this->loadModel($id);

                $model = new EssaysHasCrugeUser;

                $idStudent = Students::model()->find('profile_id=' . $_POST['idProfile'])->id;

                $model->status = 1;
                $model->stardate = strtotime($_POST['stardate']);
                $model->enddate = strtotime($_POST['enddate']);
                $model->essays_id = $_POST['idEssay'];
                $model->title_essay = $essay->getNameTitleEssay($idStudent, $essay->colleges_has_majors_colleges_id, $essay->type_essay_id, $_POST['idEssay']);
                $model->students_id = $idStudent;

                /* echo "<pre>";
                  echo print_r($model->enddate);
                  echo "</pre>";
                  Yii::app()->end(); */

                if ($model->save()) {
                    Yii::app()->user->setFlash('save','El Estudiante se ha agregado correctamente.');
                    $this->redirect(array('view', 'id' => $model->essays_id));
                }
            }
            Yii::app()->user->setFlash('error','Debe seleccionar un Estudiante, la fecha de inicio y culminación del Essay.');
            $this->redirect(array('view', 'id' => $_POST['idEssay']));
        }
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Essays;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        //if (isset($_POST['Essays']) && isset($_FILES)) {
        if (isset($_POST['Essays'])) {

            /* echo "<pre>";
              echo print_r($students);
              echo "</pre>";
              Yii::app()->end();

              $name = $_FILES['Essays']['name']['file_name'];
              $ruta = $_FILES['Essays']['tmp_name']['file_name'];

              $name = htmlentities($name, ENT_QUOTES);

              $pos = strripos($name, '.');

              //$tipo=explode(".",$name);
              //$type=strtolower($tipo[1]);
              $type = substr($name, $pos+1, strlen($name));

              //$refencia=sha1(date("r"));
              $refencia = $model->getNameFileEssay($_POST['selectCollege'],$_POST['Essays']['type_essay_id']);

              $file = $refencia .".".$type;

              $directorio = "D:/htdocs/via-college/uploads/" . $file;

              if (move_uploaded_file($ruta, $directorio))
              { */
            //print( "El archivo fue subido con éxito.");
            //Yii::app()->end();
            $model->attributes = $_POST['Essays'];
            $model->colleges_has_majors_colleges_id = $_POST['selectCollege'];
            $model->colleges_has_majors_majors_id = $_POST['selectMajor'];
            //$model->file_name = $file;

            if ($model->save()) {
                $this->redirect(array('view', 'id' => $model->id_essays));
            }
            /* } 
              else
              {
              print("Error al intentar subir el archivo.");
              Yii::app()->end();
              } */
        }

        $this->render('create', array(
            'model' => $model,
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

        if (isset($_POST['Essays'])) {
            $model->attributes = $_POST['Essays'];
            if ($model->save()) {
                $this->redirect(array('view', 'id' => $model->id_essays));
            }
        }

        $this->render('update', array(
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
            if (!isset($_GET['ajax'])) {
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
            }
        } else {
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
        }
    }

    public function actionRemove($id) {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $model = EssaysHasCrugeUser::model()->find('students_id=' . $id . ' AND essays_id=' . $_POST['idx']);
            $model->delete();
            Yii::app()->user->setFlash('remove','El Estudiante se ha removido correctamente.');

            $this->redirect(array('view', 'id' => $_POST['idx']));
        } else {
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Essays');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Essays('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Essays'])) {
            $model->attributes = $_GET['Essays'];
        }

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    public function actionList() {
        if (Yii::app()->user->checkAccess('Tutor') && !Yii::app()->user->isSuperAdmin) {
            $profile = Profile::model()->find('cruge_user_iduser=' . Yii::app()->user->id);

            $dataStudents = new CActiveDataProvider('Students', array(
                'criteria' => array(
                    'condition' => 'tutor_id= :id AND NOT EXISTS (SELECT * FROM essays_has_cruge_user WHERE students_id = id) AND EXISTS (SELECT * FROM profile WHERE t.id = id)',
                    //'condition'=>'tutor_id= :id',
                    'params' => array(':id' => Tutor::model()->find('profile_id=' . $profile->id)->id_tutor)
                ),
            ));

            $dataStudentEssay = new CActiveDataProvider('EssaysHasCrugeUser', array(
                'criteria' => array(
                    'condition' => 'EXISTS (SELECT * FROM students WHERE tutor_id = :id AND students_id = id)',
                    //'condition'=>'tutor_id= :id',
                    'params' => array(':id' => Tutor::model()->find('profile_id=' . $profile->id)->id_tutor)
                ),
            ));
        } else if (Yii::app()->user->checkAccess('Aliado') || Yii::app()->user->checkAccess('College') || Yii::app()->user->isSuperAdmin) {
            /* $dataStudents=new CActiveDataProvider('Students', array(
              'criteria'=>array(
              'condition'=>'NOT EXISTS (SELECT * FROM essays_has_cruge_user WHERE students_id = id)',
              //'condition'=>'tutor_id= :id',
              //'params'=>array(':id'=>Tutor::model()->find('profile_id='.$profile->id)->id_tutor)
              ),
              )); */
            /* $dataStudents=new CActiveDataProvider('Students', array(
              'criteria'=>array(
              'with'=>array('profile'=>array(
              'with'=>array('crugeUserIduser'=>array(
              'on' => '`cruge_user` ON cruge_user_iduser = iduser AND `cruge_user`.state =1',
              'joinType' => 'INNER JOIN',
              )),
              'on' => 'students`.profile_id =  `profile`.id_profile',
              'joinType' => 'INNER JOIN',
              )),
              //'condition'=>'t.state= :id',
              //'params'=>array(':id'=>0)
              ),
              )); */

            $sql = 'SELECT id, firstname, secondname, lastname1, lastname2, sex,  `profile`.email, tutor_id, cruge_user_iduser,  `cruge_user`.state
					FROM  `students` 
					INNER JOIN (
					`profile` 
					INNER JOIN  `cruge_user` ON cruge_user_iduser = iduser
					AND  `cruge_user`.state =1
					) ON  `students`.profile_id =  `profile`.id_profile';

            $count = Yii::app()->db->createCommand('SELECT COUNT(*)
													FROM  `students` 
													INNER JOIN (
													`profile` 
													INNER JOIN  `cruge_user` ON cruge_user_iduser = iduser
													AND  `cruge_user`.state =1
													) ON  `students`.profile_id =  `profile`.id_profile')->queryScalar();


            $dataStudents = new CSqlDataProvider($sql, array(
                'totalItemCount' => $count,
                'sort' => array(
                    'defaultOrder' => array(
                        'id' => CSort::SORT_ASC, //default sort value
                    ),
                    'attributes' => array(
                        'id', 'firstname', 'secondname', 'lastname1', 'lastname2', 'sex', 'email', 'tutor_id', 'cruge_user_iduser', 'state'
                    ),
                ),
                'pagination' => array(
                    'pageSize' => 10,
                ),
            ));

            $dataStudentEssay = new CActiveDataProvider('EssaysHasCrugeUser', array(
                'criteria' => array(
                    'condition' => 'EXISTS (SELECT * FROM students WHERE students_id = id)',
                //'condition'=>'tutor_id= :id',
                //'params'=>array(':id'=>Tutor::model()->find('profile_id='.$profile->id)->id_tutor)
                ),
            ));
        }
        /* echo "<pre>";
          echo print_r($profile->tutors->id_tutor);
          echo "</pre>";
          Yii::app()->end(); */

        //$student = Students::model()->find('profile_id='.$profile->id);



        $this->render('list', array(
            'dataStudents' => $dataStudents, 'dataStudentEssay' => $dataStudentEssay//,'profile' => $profile,//'student' => $student
        ));

        //$this->render('index',array('id'=>$idUser));
    }

    public function actionCargarMajor() {
        if (Yii::app()->request->isAjaxRequest && isset($_POST['idCollege'])) {
            //echo CHtml::encode(print_r($_POST, true));//imprimir si algo llega x post

            $searched = $_POST['idCollege'];
            $criteria = new CDbCriteria;
            $criteria->condition = "id= :searched";
            $criteria->params = array(":searched" => "$searched");

            $college = Colleges::model()->findAll($criteria);

            /* $data = requerimiento::model()->findAll('PRY_Id=:parent_id',
              array(':parent_id'=>(int) $_POST['PRY_Id'])); */

            $data = CHtml::listData($college[0]->majors, 'id', 'name');

            foreach ($data as $id => $value) {
                echo CHtml::tag('option', array('value' => $id), CHtml::encode($value), true);
            }
            Yii::app()->end();
        }
    }

    /* 	
      public function actionBuscarStudents() {
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
      $has_essay = EssaysHasCrugeUser::model()->find('students_id='.$profile->id_profile.' AND essays_id='.$id)? true : false;

      if(!$has_essay && !$is_tutor && !$is_padre && $active==1){
      $returnVal .= ucwords($profile->identification." ".$profile->firstname." ".$profile->secondname." ".$profile->lastname1." ".$profile->lastname2
      .'|'.$profile->id_profile.'|'.$profile->identification.'|'.$profile->firstname." ".$profile->secondname.'|'.$profile->lastname1." ".$profile->lastname2.'|'.$profile->email."\n");
      }
      }
      header('Content-Type: application/json; charset="UTF-8"');
      echo json_encode($returnVal);
      Yii::app()->end();
      //echo $returnVal;
      }
      } */

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Essays the loaded model
     * @throws CHttpException
     */
    public function actionGenerate() {

        // Generar un archivo PDF
        # mPDF
        $mPDF1 = Yii::app()->ePdf->mpdf();

        # You can easily override default constructor's params
        $mPDF1 = Yii::app()->ePdf->mpdf('', 'Letter');
        # render (full page)
        $mPDF1->WriteHTML($this->renderPartial('pdf', true));
        # Load a stylesheet
        //$stylesheet = file_get_contents(Yii::getPathOfAlias('webroot.css') . '/ett.css');
        //$mPDF1->WriteHTML($stylesheet, 1);
        # Outputs ready PDF
        $mPDF1->Output();
    }

    public function loadModel($id) {
        $model = Essays::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Essays $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'essays-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
