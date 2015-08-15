<?php

/**
 * This is the model class for table "profile".
 *
 * The followings are the available columns in table 'profile':
 * @property integer $id_profile
 * @property string $identification
 * @property string $firstname
 * @property string $secondname
 * @property string $lastname1
 * @property string $lastname2
 * @property integer $sex
 * @property string $date_of_birth
 * @property string $email
 * @property integer $country
 * @property integer $state
 * @property integer $city
 * @property string $address
 * @property string $tel_local
 * @property string $tel_mobil
 * @property string $status
 * @property integer $cruge_user_iduser
 *
 * The followings are the available model relations:
 * @property Parents[] $parents
 * @property CrugeUser $crugeUserIduser
 * @property Students[] $students
 * @property Tutor[] $tutors
 */
class Profile extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'profile';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cruge_user_iduser', 'required'),
			array('sex, country, state, city, cruge_user_iduser', 'numerical', 'integerOnly'=>true),
			array('identification, lastname2, date_of_birth, tel_mobil, status', 'length', 'max'=>45),
			array('firstname, secondname, lastname1', 'length', 'max'=>64),
			array('email', 'length', 'max'=>128),
			array('address', 'length', 'max'=>512),
			array('tel_local', 'length', 'max'=>68),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_profile, identification, firstname, secondname, lastname1, lastname2, sex, date_of_birth, email, country, state, city, address, tel_local, tel_mobil, status, cruge_user_iduser', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'parents' => array(self::HAS_MANY, 'Parents', 'profile_id'),
			'user' => array(self::BELONGS_TO, 'CrugeStoredUser', 'cruge_user_iduser'),
			'students' => array(self::HAS_MANY, 'Students', 'profile_id'),
			'tutors' => array(self::HAS_MANY, 'Tutor', 'profile_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_profile' => 'Id Profile',
			'identification' => 'Identification',
			'firstname' => 'Firstname',
			'secondname' => 'Secondname',
			'lastname1' => 'Lastname1',
			'lastname2' => 'Lastname2',
			'sex' => 'Sex',
			'date_of_birth' => 'Date Of Birth',
			'email' => 'Email',
			'country' => 'Country',
			'state' => 'State',
			'city' => 'City',
			'address' => 'Address',
			'tel_local' => 'Tel Local',
			'tel_mobil' => 'Tel Mobil',
			'status' => 'Status',
			'cruge_user_iduser' => 'Cruge User Iduser',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_profile',$this->id_profile);
		$criteria->compare('identification',$this->identification,true);
		$criteria->compare('firstname',$this->firstname,true);
		$criteria->compare('secondname',$this->secondname,true);
		$criteria->compare('lastname1',$this->lastname1,true);
		$criteria->compare('lastname2',$this->lastname2,true);
		$criteria->compare('sex',$this->sex);
		$criteria->compare('date_of_birth',$this->date_of_birth,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('country',$this->country);
		$criteria->compare('state',$this->state);
		$criteria->compare('city',$this->city);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('tel_local',$this->tel_local,true);
		$criteria->compare('tel_mobil',$this->tel_mobil,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('cruge_user_iduser',$this->cruge_user_iduser);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function validarStatus($iduser) { 
		$status = Yii::app()->user->um->loadUserById($iduser /*, true (para que cargue sus campos)*/)->state;
		
		if($status==0){return TbHtml::labelTb("Inactivo");}
		else if($status==1){return TbHtml::labelTb("Activo", array('color' => TbHtml::LABEL_COLOR_SUCCESS));}
		else if($status==2){return TbHtml::labelTb("Suspendido",array('color' => TbHtml::LABEL_COLOR_INVERSE));}
	}
	
	public function botonStatus($iduser) { 
		$status = Yii::app()->user->um->loadUserById($iduser /*, true (para que cargue sus campos)*/)->state;
		
		if($status == 0){
			return TbHtml::button("Status",array(
							'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
							'size'=>TbHtml::BUTTON_SIZE_MINI,
							'submit'=>array('/cruge/ui/usermanagementupdate','id'=>$iduser),
							)
						);
		}
		return "";		
	}	

	public function validarSexo($sex) { 
		if($sex==1){return "M";}
		else if($sex==2){return "F";}
	}	
	
	public function nombreCompleto($name1, $name2){
		return ucwords($name1." ".$name2);
	}
	
	public function apellidoCompleto($lastname1, $lastname2){
		return ucwords($lastname1." ".$lastname2);
	}	
	
	public function nombreApellido($name1, $name2, $lastname1, $lastname2){
		$nameComplete = $name1;
		if(!empty($name2)){ $nameComplete .= " ".substr($name2, 0, 1);}
		$nameComplete .= " ".$lastname1;
		if(!empty($lastname2)){ $nameComplete .= " ".substr($lastname2, 0, 1);}
		return ucwords($nameComplete);
	}	
	
	public function crearArrayStudentsRequirement($idRequirement){
		$sql = 'EXISTS (SELECT * FROM students WHERE profile_id=id_profile AND requirements_id IS NULL OR requirements_id<>'.$idRequirement.') ORDER BY firstname,secondname,lastname1,lastname2';
		$students = $this->model()->findAll($sql);
		
		$arr = array();
		foreach($students as $student)
		{
			$valor = $student->identification." ".$student->firstname;
			if(!empty($student->secondname)){$valor .= " ".$student->secondname;}
			$valor .= " ".$student->lastname1;
			if(!empty($student->lastname2)){$valor .= " ".$student->lastname2;}
			
			$arr[$student->id_profile] = ucwords($valor);
		}
		return $arr;
	}	
	
	public function crearArrayStudentsEssay($idEssay){
		$sql = 'EXISTS (SELECT state FROM cruge_user WHERE iduser=cruge_user_iduser AND state=1) AND EXISTS (SELECT * FROM students WHERE profile_id=id_profile AND NOT EXISTS (SELECT * FROM essays_has_cruge_user WHERE students_id=id AND essays_id='.$idEssay.')) ORDER BY firstname,secondname,lastname1,lastname2';
		$students = $this->model()->findAll($sql);
		
		$arr = array();
		foreach($students as $student)
		{
			$valor = $student->identification." ".$student->firstname;
			if(!empty($student->secondname)){$valor .= " ".$student->secondname;}
			$valor .= " ".$student->lastname1;
			if(!empty($student->lastname2)){$valor .= " ".$student->lastname2;}
			
			$arr[$student->id_profile] = ucwords($valor);
		}
		return $arr;
	}	

	public function crearArrayStudentsParents(){
		$sql = 'EXISTS (SELECT * FROM students WHERE profile_id=id_profile AND parents_id IS NULL) ORDER BY firstname,secondname,lastname1,lastname2';
		$students = $this->model()->findAll($sql);
		
		$arr = array();
		foreach($students as $student)
		{
			$valor = $student->identification." ".$student->firstname;
			if(!empty($student->secondname)){$valor .= " ".$student->secondname;}
			$valor .= " ".$student->lastname1;
			if(!empty($student->lastname2)){$valor .= " ".$student->lastname2;}
			
			$arr[$student->id_profile] = ucwords($valor);
		}
		return $arr;
	}
	
	public function crearArrayStudentsTutor(){
		$sql = 'EXISTS (SELECT state FROM cruge_user WHERE iduser=cruge_user_iduser AND state=1) AND EXISTS (SELECT * FROM students WHERE profile_id=id_profile AND tutor_id IS NULL) ORDER BY firstname,secondname,lastname1,lastname2';
		$students = $this->model()->findAll($sql);
		
		$arr = array();
		foreach($students as $student)
		{
			$valor = $student->identification." ".$student->firstname;
			if(!empty($student->secondname)){$valor .= " ".$student->secondname;}
			$valor .= " ".$student->lastname1;
			if(!empty($student->lastname2)){$valor .= " ".$student->lastname2;}
			
			$arr[$student->id_profile] = ucwords($valor);
		}
		return $arr;
	}

	public function crearArrayTutorStudents(){
		$sql = 'EXISTS (SELECT state FROM cruge_user WHERE iduser=cruge_user_iduser AND state=1) AND EXISTS (SELECT * FROM tutor WHERE profile_id=id_profile) ORDER BY firstname,secondname,lastname1,lastname2';
		$students = $this->model()->findAll($sql);
		
		$arr = array();
		foreach($students as $student)
		{
			$valor = $student->identification." ".$student->firstname;
			if(!empty($student->secondname)){$valor .= " ".$student->secondname;}
			$valor .= " ".$student->lastname1;
			if(!empty($student->lastname2)){$valor .= " ".$student->lastname2;}
			
			$arr[$student->id_profile] = ucwords($valor);
		}
		return $arr;
	}	

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Profile the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
