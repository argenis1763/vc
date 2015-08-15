<?php

/**
 * This is the model class for table "students".
 *
 * The followings are the available columns in table 'students':
 * @property integer $id
 * @property integer $profile_id
 * @property string $user_college
 * @property string $pass_college
 * @property integer $tutor_id
 * @property integer $requirements_id
 * @property integer $parents_id
 *
 * The followings are the available model relations:
 * @property EssaysHasCrugeUser[] $essaysHasCrugeUsers
 * @property Profile $profile
 * @property Requirements $requirements
 * @property Parents $parents
 * @property Tutor $tutor
 * @property Questionnaires[] $questionnaires
 */
class Students extends CActiveRecord
{
	public $identification;
	public $firstname;
	public $secondname;
	public $lastname1;
	public $lastname2;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'students';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('profile_id', 'required'),
			array('profile_id, tutor_id, requirements_id, parents_id', 'numerical', 'integerOnly'=>true),
			array('user_college, pass_college', 'length', 'max'=>45),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, profile_id, user_college, pass_college, tutor_id, requirements_id, parents_id,identification,firstname,secondname,lastname1,lastname2', 'safe', 'on'=>'search'),
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
			'essaysHasCrugeUsers' => array(self::HAS_MANY, 'EssaysHasCrugeUser', 'students_id'),
			'profile' => array(self::BELONGS_TO, 'Profile', 'profile_id'),
			'requirements' => array(self::BELONGS_TO, 'Requirements', 'requirements_id'),
			'parents' => array(self::BELONGS_TO, 'Parents', 'parents_id'),
			'tutor' => array(self::BELONGS_TO, 'Tutor', 'tutor_id'),
			'questionnaires' => array(self::MANY_MANY, 'Questionnaires', 'students_has_questionnaires(students_id, questionnaires_id)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'profile_id' => 'Profile',
			'user_college' => 'User College',
			'pass_college' => 'Pass College',
			'tutor_id' => 'Tutor',
			'requirements_id' => 'Requirements',
			'parents_id' => 'Parents',
			
			'identification' => 'C.I./D.N.I',
			'firstname' => 'Primer Nombre',
			'secondname' => 'Segundo Nombre',
			'lastname1' => 'Primer Apellido',
			'lastname2' => 'Segundo Apellido',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('profile_id',$this->profile_id);
		$criteria->compare('user_college',$this->user_college,true);
		$criteria->compare('pass_college',$this->pass_college,true);
		$criteria->compare('tutor_id',$this->tutor_id);
		$criteria->compare('requirements_id',$this->requirements_id);
		$criteria->compare('parents_id',$this->parents_id);
		
		// Do all joins in the same SQL query
		$criteria->together  =  true;
		// Join the 'location' table
		$criteria->with = array('profile');
		
		// Add comparisons for each of the relational attributes
		if($this->identification){
		  $criteria->compare('profile.identification',$this->identification);
		}		
		if($this->firstname){
		  $criteria->compare('profile.firstname',$this->firstname,true);
		}
		if($this->secondname){
		  $criteria->compare('profile.secondname',$this->secondname,true);
		}
		if($this->lastname1){
		  $criteria->compare('profile.lastname1',$this->lastname1,true);
		}
		if($this->lastname2){
		  $criteria->compare('profile.lastname2',$this->lastname2,true);
		}

		// Create a custom sort
		$sort=new CSort;
		$sort->attributes=array(
		  'id',
		  'profile_id',
		  'user_college',
		  'pass_college',
		  'tutor_id',
		  'requirements_id',
		  'parents_id',
		  // For each relational attribute, create a 'virtual attribute' using the public variable name
		  'identification' => array(
			'asc' => 'profile.identification',
			'desc' => 'profile.identification DESC',
			'label' => 'C.I./D.N.I',
		  ),		  
		  'firstname' => array(
			'asc' => 'profile.firstname',
			'desc' => 'profile.firstname DESC',
			'label' => 'Primer Nombre',
		  ),
		  'secondname' => array(
			'asc' => 'profile.secondname',
			'desc' => 'profile.secondname DESC',
			'label' => 'Segundo Nombre',
		  ),
		  'lastname1' => array(
			'asc' => 'profile.lastname1',
			'desc' => 'profile.lastname1 DESC',
			'label' => 'Primer Apellido',
		  ),
		  'lastname2' => array(
			'asc' => 'profile.lastname2',
			'desc' => 'profile.lastname2 DESC',
			'label' => 'Segundo Apellido',
		  ),		  
		  '*',
		);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getNameShort($id)
	{
		$student = Students::model()->findByPk($id);
		
		$firstname = empty($student->profile->firstname)? "" : strtoupper(substr($student->profile->firstname, 0, 1));
		$secondname = empty($student->profile->secondname)? "" : strtoupper(substr($student->profile->secondname, 0, 1));
		$lastname = empty($student->profile->lastname1)? "" : strtoupper(substr($student->profile->lastname1, 0, 1));
		$lastname1 = empty($student->profile->lastname2)? "" : strtoupper(substr($student->profile->lastname2, 0, 1));
		
		return $firstname.$secondname.$lastname.$lastname1;
	}	

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Students the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
