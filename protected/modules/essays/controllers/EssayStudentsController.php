<?php

class EssayStudentsController extends Controller
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
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index','write','download'),
                'roles' => array('Analista_I', 'College','Estudiante'),
            ),
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index'),
                'roles' => array('Aliado', 'College','Estudiante'),
            ),
            array('deny', // deny all users
                'roles' => array('*'),
			),
		);
	}	
	
	public function actionIndex()
	{
		if(Yii::app()->user->checkAccess('Tutor') && !Yii::app()->user->isSuperAdmin){
			$profile = Profile::model()->find('cruge_user_iduser='.Yii::app()->user->id);
			
			/*$dataStudents=new CActiveDataProvider('Students', array(
			'criteria'=>array(
				'condition'=>'tutor_id= :id AND NOT EXISTS (SELECT * FROM essays_has_cruge_user WHERE students_id = id) AND EXISTS (SELECT * FROM profile WHERE t.id = id)',
				//'condition'=>'tutor_id= :id',
				'params'=>array(':id'=>Tutor::model()->find('profile_id='.$profile->id_profile)->id_tutor)
				),
			));	*/		
			
			$dataStudentEssay=new CActiveDataProvider('EssaysHasCrugeUser', array(
			'criteria'=>array(
				'condition'=>'EXISTS (SELECT * FROM students WHERE tutor_id = :id AND students_id = id)',
				//'condition'=>'tutor_id= :id',
				'params'=>array(':id'=>Tutor::model()->find('profile_id='.$profile->id_profile)->id_tutor)
				),
			));				
			
		} else if(Yii::app()->user->checkAccess('Aliado') || Yii::app()->user->checkAccess('College') || Yii::app()->user->isSuperAdmin){
			/*$dataStudents=new CActiveDataProvider('Students', array(
			'criteria'=>array(
				'condition'=>'NOT EXISTS (SELECT * FROM essays_has_cruge_user WHERE students_id = id)',
				//'condition'=>'tutor_id= :id',
				//'params'=>array(':id'=>Tutor::model()->find('profile_id='.$profile->id)->id_tutor)
				),
			));*/
			/*$dataStudents=new CActiveDataProvider('Students', array(
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
			));*/
			
			/*$sql='SELECT id, firstname, secondname, lastname1, lastname2, sex,  `profile`.email, tutor_id, cruge_user_iduser,  `cruge_user`.state
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

			$dataStudents =  new CSqlDataProvider($sql,array(
                    'totalItemCount' => $count,
 
                    'sort' => array(
                        'defaultOrder' => array(
                            'id' => CSort::SORT_ASC, //default sort value
                        ),
						'attributes'=>array(
							 'id', 'firstname', 'secondname', 'lastname1', 'lastname2', 'sex', 'email', 'tutor_id', 'cruge_user_iduser', 'state'
						),						
                    ),
                    'pagination' => array(
                        'pageSize' => 10,
                    ),			
			));	*/				
			
			$dataStudentEssay=new CActiveDataProvider('EssaysHasCrugeUser', array(
			'criteria'=>array(
				'condition'=>'EXISTS (SELECT * FROM students WHERE students_id = id)',
				//'condition'=>'tutor_id= :id',
				//'params'=>array(':id'=>Tutor::model()->find('profile_id='.$profile->id)->id_tutor)
				),
				'pagination' => array(
					'pageSize' => 10,
				),			
			));					
		}else if(Yii::app()->user->checkAccess('Estudiante') && !Yii::app()->user->isSuperAdmin){
			$profile = Profile::model()->find('cruge_user_iduser='.Yii::app()->user->id);
			
			$dataStudentEssay=new CActiveDataProvider('EssaysHasCrugeUser', array(
			'criteria'=>array(
				'condition'=>'students_id = :id',
				//'condition'=>'tutor_id= :id',
				'params'=>array(':id'=>Students::model()->find('profile_id='.$profile->id_profile)->id)
				),
			));
		}		
		
		$this->render('index',array(
			'dataStudentEssay'=>$dataStudentEssay,
		));	
		
	}		
	
	public function actionWrite($id)
	{		
		$_SESSION['KCFINDER']['disabled'] = false; // enables the file browser in the admin
		$_SESSION['KCFINDER']['uploadURL'] = Yii::app()->baseUrl."/uploads/"; // enables the file browser in the admin
		$_SESSION['KCFINDER']['uploadDir'] = Yii::app()->basePath."/../uploads/"; // enables the file browser in the admin	
		
		/*$model=EssaysHasCrugeUser::model()->findByPk($id);				

		if(empty($model->essaysDetails) && !isset($_POST['EssaysDetail'])){			
			$model->addDetail();		
		}

		if (isset($_POST['EssaysDetail'])) {

			$model->setRelationRecords('essaysDetails',is_array(@$_POST['EssaysDetail']) ? $_POST['EssaysDetail'] : array());	

			if ($model->save()) {			
				Yii::app()->user->setFlash('profile-flash','save');			
				$this->redirect(array('write','id'=>$id));
			}
		}
		
		$this->render('write',array(
			'model'=>$model,//'essay' => $essay,
		));*/

		$essay=EssaysHasCrugeUser::model()->findByPk($id);		

		if(empty($essay->essaysDetails)){
			$model= new EssaysDetail;
		}else{
			$criteria = new CDbCriteria;
			$criteria->condition = "essays_has_cruge_user_id_essay_cruge= :searched ORDER BY lastdate DESC";
			$criteria->params = array(":searched"=>$id);

			$model=EssaysDetail::model()->find($criteria);		
		}		

		if (isset($_POST['EssaysDetail'])) {

			/*echo "<pre>";
			echo print_r($_POST);
			echo "</pre>";
			Yii::app()->end();*/
			$detail = new EssaysDetail;
			
			$detail->attributes=$_POST['EssaysDetail'];
			$detail->lastdate = time();
			$detail->essays_has_cruge_user_id_essay_cruge = $_POST['idEssay'];
			
			if(isset($_POST['send'])){
				$historial = new EssaysHistorical;
				
				$historial->attributes=$_POST['EssaysDetail'];
				$historial->lastdate = time();
				$historial->file_name = $essay->title_essay."-".EssaysHistorical::model()->calcularVersion($_POST['idEssay']);
				$historial->version = EssaysHistorical::model()->calcularVersion($_POST['idEssay']);
				$historial->essays_has_cruge_user_id_essay_cruge = $_POST['idEssay'];
				
				$essay->status = 8;
				
				if ($detail->save() && $historial->save() && $essay->save()) {
					Yii::app()->user->setFlash('send','El Essay se ha enviado correctamente.');			
					$this->redirect(array('write','id'=>$detail->essays_has_cruge_user_id_essay_cruge));
				}				
			}
			if(isset($_POST['upload']) && isset($_FILES)){
				
				$name = $_FILES['EssaysHistorical']['name']['file_name'];
				$ruta = $_FILES['EssaysHistorical']['tmp_name']['file_name'];
				
				$name = htmlentities($name, ENT_QUOTES);
				
				$pos = strripos($name, '.');
				
				//$tipo=explode(".",$name);
				//$type=strtolower($tipo[1]);
				$type = substr($name, $pos+1, strlen($name));

				if($type == "pdf"){
					
					$version = Yii::app()->db->createCommand("SELECT COUNT(*) FROM essays_historical WHERE essays_has_cruge_user_id_essay_cruge=".$_POST['idEssay'])->queryScalar() - 1;
					$historial = EssaysHistorical::model()->find('essays_has_cruge_user_id_essay_cruge='.$_POST['idEssay'].' AND version="V'.$version.'"');				
				
					//$refencia=sha1(date("r"));
					$refencia = $essay->title_essay."-".$historial->version."-CORR";
					
					$file = $refencia .".".$type;

					$directorio = "D:/htdocs/via-college/uploads/" . $file;
					//$directorio = "C:/xampp/htdocs/via-college/uploads/" . $file;
					//$directorio = "var/www/vhosts/via-college.com/app.via-college.com/uploads/" . $file;
					if (move_uploaded_file($ruta, $directorio))
					{
						//print( "El archivo fue subido con éxito.");
						//Yii::app()->end();
						
						$historial->attributes=$_POST['EssaysDetail'];
						$historial->lastdate = time();
						$historial->file_name = $file;
						$historial->essays_has_cruge_user_id_essay_cruge = $_POST['idEssay'];	

						$essay->status = 7;	
						
						if ($historial->save() && $essay->save()) {
							Yii::app()->user->setFlash('upload','Las corrección del Essay se ha enviado correctamente.');			
							$this->redirect(array('write','id'=>$model->essays_has_cruge_user_id_essay_cruge));
						}				
					} 
					else{
						Yii::app()->user->setFlash('error','Error al intentar subir el archivo.');			
						$this->redirect(array('write','id'=>$model->essays_has_cruge_user_id_essay_cruge));					
						//print("Error al intentar subir el archivo.");
						//Yii::app()->end();
					}				
				}else{
					//print("El tipo de archivo permitido no es el correcto.");
					//Yii::app()->end();
					Yii::app()->user->setFlash('file','El tipo de archivo permitido para la correción no es el correcto.');			
					$this->redirect(array('write','id'=>$model->essays_has_cruge_user_id_essay_cruge));				
				}
			}
			if ($detail->save()) {
				Yii::app()->user->setFlash('save','El Essay se ha agregado correctamente.');			
				$this->redirect(array('write','id'=>$detail->essays_has_cruge_user_id_essay_cruge));
			}
		}
		if(isset($_POST['end'])){
			$version = Yii::app()->db->createCommand("SELECT COUNT(*) FROM essays_historical WHERE essays_has_cruge_user_id_essay_cruge=".$_POST['idEssay'])->queryScalar() - 1;
			$historial = EssaysHistorical::model()->find('essays_has_cruge_user_id_essay_cruge='.$_POST['idEssay'].' AND version="V'.$version.'"');
			
			$name = $essay->title_essay;	
			
			$historial->file_name = $name."-VF";
			$historial->version = "VF";
			$essay->status = 10;
			
			if ($historial->save() && $essay->save()) {
				Yii::app()->user->setFlash('end','El Essay Final se ha enviado correctamente.');			
				$this->redirect(array('write','id'=>$model->essays_has_cruge_user_id_essay_cruge));
			}				
		}		
		
        if (isset($_POST['Status'])) {
            $essay->status = $_POST['Status'];
			if ($essay->save()) {
				Yii::app()->user->setFlash('status','El Status se ha cambiado correctamente.');			
				$this->redirect(array('write','id'=>$essay->id_essay_cruge));
			}
        }		
		
		$this->render('write',array(
			'model'=>$model,'essay' => $essay,
		));	
	}	

	public function actionDownload(){
		//$name = EssaysHistorical::model()->decrypt($name);
		//$path = 'http://'.$_SERVER['SERVER_NAME'].Yii::app()->baseUrl.'/uploads/'.$name;
		/*echo "<pre>";
		echo print_r(curl_escape($path));
		echo "</pre>";
		Yii::app()->end();
		$filecontent=file_get_contents($path);
		header("Content-Type: text/plain");
		header("Content-disposition: attachment; filename=$name");
		header("Pragma: no-cache");
		echo $filecontent;
		exit;*/
		
		//Si la variable archivo que pasamos por URL no esta 
		//establecida acabamos la ejecucion del script.
		if (!isset($_GET['file']) || empty($_GET['file'])) {
		   exit();
		}

		//Utilizamos basename por seguridad, devuelve el 
		//nombre del archivo eliminando cualquier ruta. 
		$archivo = urldecode(basename($_GET['file']));
		
		$ruta = 'uploads/'.$archivo;

		if (is_file($ruta))
		{
		   header('Content-Type: application/force-download');
		   header('Content-Disposition: attachment; filename='.$archivo);
		   header('Content-Transfer-Encoding: binary');
		   header('Content-Length: '.filesize($ruta));

		   readfile($ruta);
		}
		else
		   exit();		
	}
		
	
}