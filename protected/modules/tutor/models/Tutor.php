<?php

/**
 * This is the model class for table "tutor".
 *
 * The followings are the available columns in table 'tutor':
 * @property integer $id_tutor
 * @property integer $profile_id
 *
 * The followings are the available model relations:
 * @property Students[] $students
 * @property Profile $profile
 */
class Tutor extends CActiveRecord
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
		return 'tutor';
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
			array('profile_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_tutor, profile_id,firstname,secondname,lastname1,lastname2', 'safe', 'on'=>'search'),
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
			'students' => array(self::HAS_MANY, 'Students', 'tutor_id'),
			'profile' => array(self::BELONGS_TO, 'Profile', 'profile_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_tutor' => 'ID',
			'profile_id' => 'Profile',
			
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

		$criteria->compare('id_tutor',$this->id_tutor);
		$criteria->compare('profile_id',$this->profile_id);
		
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
		  'id_tutor',
		  'profile_id',
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
		
		/*return new CActiveDataProvider($this, array(
				'criteria'=>array(
					'with'=>array('profile'=>array(
							'on' => 'profile_id = id_profile',
							'joinType' => 'INNER JOIN',
					)),
				//'condition'=>'t.state= :id',
				//'params'=>array(':id'=>0)
				),
		));*/
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getNombre($id){
		if(!empty($id)){
			$tutor = Tutor::model()->findByPk($id);
			return Profile::model()->nombreApellido($tutor->profile->firstname,$tutor->profile->secondname,$tutor->profile->lastname1,$tutor->profile->lastname2);
		}
		return TbHtml::labelTb("Sin asignar", array('color' => TbHtml::LABEL_COLOR_IMPORTANT));
	}
	
	public function botonAsignar($idTutor,$idStudent){
		if(empty($idTutor)){
			return TbHtml::button("Tutor",array(
							'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
							'size'=>TbHtml::BUTTON_SIZE_MINI,
							'submit'=>array('/students/students/view','id'=>$idStudent),
							)
						);
		}
		return "";
	}	

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tutor the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
