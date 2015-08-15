<?php

class UsersController extends Controller {

    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl',
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
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin'),
                'roles' => array('College','Analista_I'),
			),		
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('registrate'),
                'users' => array('*'),
            ),
            array('deny', // deny all users
                'roles' => array('*'),
				'users' => array('*'),
            ),
        );
    }
	
	public function actionAdmin()
	{

		$dataStudents=new CActiveDataProvider('Students', array(
			'criteria'=>array(
				'with'=>array('profile'=>array(
								'with'=>array('user'=>array(
								'on' => 'cruge_user_iduser = iduser',
								'joinType' => 'INNER JOIN',								
							)),				
							'on' => 'profile_id = id_profile',
							'joinType' => 'INNER JOIN',
				)),
				'order'=>'tutor_id,user.state ASC, user.regdate DESC',
			),
			'pagination'=>array(
				'pageSize'=>10,
			),			
		));
		
		$dataTutor=new CActiveDataProvider('Tutor', array(
			'criteria'=>array(
				'with'=>array('profile'=>array(
								'with'=>array('user'=>array(
								'on' => 'cruge_user_iduser = iduser',
								'joinType' => 'INNER JOIN',								
							)),				
							'on' => 'profile_id = id_profile',
							'joinType' => 'INNER JOIN',
				)),
				'order'=>'user.state ASC, user.regdate DESC',
			),
			'pagination'=>array(
				'pageSize'=>10,
			),			
		));		
		
		$dataParents=new CActiveDataProvider('Parents', array(
			'criteria'=>array(
				'with'=>array('profile'=>array(
								'with'=>array('user'=>array(
								'on' => 'cruge_user_iduser = iduser',
								'joinType' => 'INNER JOIN',								
							)),				
							'on' => 'profile_id = id_profile',
							'joinType' => 'INNER JOIN',
				)),
				'order'=>'user.state ASC, user.regdate DESC',
			),
			'pagination'=>array(
				'pageSize'=>10,
			),			
		));		
		
		$this->render('admin',array(
			'dataStudents'=>$dataStudents, 'dataTutor'=>$dataTutor, 'dataParents'=>$dataParents,
		));
	}	

    public function actionWelcome($id) {
        Yii::app()->user->setFlash('profile-flash', "Usuario creado: id=" . $id);
        $this->render('welcome');
    }

    public function actionProfile() {

        if (Yii::app()->user->checkAccess('aliado')) {
            $this->layout = '//layouts/webapp/index';
        }

        $model = Yii::app()->user->user;  // ciudado es: user->user, el cual da al CrugeStoredUser
        Yii::app()->user->um->loadUserFields($model); // le pedimos al api que carge los campos personalizados
        $this->performAjaxValidation('crugestoreduser-form', $model);
        $postName = CrugeUtil::config()->postNameMappings['CrugeStoredUser'];
        if (isset($_POST[$postName])) {

            $model->attributes = $_POST[$postName];

            if (isset($_POST['Affiliates'])) {

                $affiliate->attributes = $_POST['Affiliates'];

                if ($model->validate()) {
                    $newPwd = trim($model->newPassword);
                    if ($newPwd != '') {
                        Yii::app()->user->um->changePassword($model, $newPwd);
                        Yii::app()->crugemailer->sendPasswordTo($model, $newPwd);
                    }
                    if (Yii::app()->user->um->save($model, 'update') && $affiliate->save()) {
                        Yii::app()->user->setFlash('profile-flash', 'Your Profile has been saved.');
                    }
                }
            } else if ($model->validate()) {
                $newPwd = trim($model->newPassword);
                if ($newPwd != '') {
                    Yii::app()->user->um->changePassword($model, $newPwd);
                    Yii::app()->crugemailer->sendPasswordTo($model, $newPwd);
                }
                if (Yii::app()->user->um->save($model, 'update')) {
                    Yii::app()->user->setFlash('profile-flash', 'Your Profile has been saved.');
                }
            }
        }

        Yii::app()->user->checkAccess('aliado') ?
                        $this->render("profile", array('model' => $model, 'affiliate' => Affiliates::model()->findByPk(Yii::app()->user->name))) : $this->render("profile", array('model' => $model));
    }

    public function actionRegistrate() {

        // asi se crea un usuario (una nueva instancia en memoria volatil)
        $user = Yii::app()->user->um->createBlankUser();

        $profile = new Profile;

        /* echo "<pre>";
          echo print_r($_POST);
          echo "</pre>";
          Yii::app()->end(); */

        if (isset($_POST['CrugeStoredUser']) && isset($_POST['UserType']) && isset($_POST['Profile'])) {
			$validate = true;
			$msg = "";
			
            $user->username = $_POST['CrugeStoredUser']['username'];
            $user->email = $_POST['CrugeStoredUser']['email'];
            // la establece como "Activada"
            //Yii::app()->user->um->activateAccount($user);
            // verifica para no duplicar
            if (Yii::app()->user->um->loadUser($user->username) != null) {
				$msg .= "El usuario {$user->username} ya ha sido creado.<br/>";
				$validate = false;
            } 
			if (Yii::app()->user->um->loadUser($user->email) != null){
                $msg .= "El email {$user->email} ya ha sido creado.";
				$validate = false;
            }
			if($validate){
				// ahora a ponerle una clave
				Yii::app()->user->um->changePassword($user, $_POST['CrugeStoredUser']['newPassword']);
				// IMPORTANTE: guarda usando el API, la cual hace pasar al usuario
				// por el sistema de filtros, por eso user->um->save()
				//
				if (Yii::app()->user->um->save($user)) {
				//creo un nuevo perfil
				$profile = new Profile;
				$profile->attributes = $_POST['Profile'];
				$profile->date_of_birth = strtotime($_POST['Profile']['date_of_birth']);
				$profile->email = $user->email;
				$profile->status = 0;
				$profile->cruge_user_iduser = $user->primaryKey;
				$profile->save();

				//guardo el tipo de user 
				$typeuser = $_POST['UserType'];

				if ($typeuser == '1') {
					$student = new Students;
					$student->profile_id = $profile->id_profile;
					$student->save();
					Yii::app()->db->createCommand()->insert('cruge_authassignment', array('userid' => $user->primaryKey, 'bizrule' => null, 'data' => 'N;', 'itemname' => 'Estudiante'));
				} else if ($typeuser == '2') {
					$parent = new Parents;
					$parent->profile_id = $profile->id_profile;
					$parent->save();
					Yii::app()->db->createCommand()->insert('cruge_authassignment', array('userid' => $user->primaryKey, 'bizrule' => null, 'data' => 'N;', 'itemname' => 'Padre'));
				} else if ($typeuser == '3') {
					$tutor = new Tutor;
					$tutor->profile_id = $profile->id_profile;
					$tutor->save();
					Yii::app()->db->createCommand()->insert('cruge_authassignment', array('userid' => $user->primaryKey, 'bizrule' => null, 'data' => 'N;', 'itemname' => 'Tutor'));
				}
				Yii::app()->crugemailer->sendRegistrationUserEmail($user, $_POST['CrugeStoredUser']['newPassword']);
					$this->redirect(array('welcome', 'id' => $user->primaryKey));
				} else {
					$errores = CHtml::errorSummary($user);
					Yii::app()->user->setFlash('profile-flash', "no se pudo crear el usuario: " . $errores);
					$this->redirect(array('error'));
					//echo "no se pudo crear el usuario: ".$errores;
				}
			}else {
				Yii::app()->user->setFlash('error', $msg);
			}			
        }

        $this->render('registrate', array(
            'user' => $user, 'profile' => $profile));
    }

    /**
     * Performs the AJAX validation.
     * @param Affiliates $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'crugestoreduser-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
