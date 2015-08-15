<?php

/**
 * This is the model class for table "essays".
 *
 * The followings are the available columns in table 'essays':
 * @property integer $id
 * @property integer $colleges_has_majors_colleges_id
 * @property integer $colleges_has_majors_majors_id
 * @property integer $type_essay_id
 * @property string $title
 * @property string $file_name
 * @property string $regdate
 * @property string $update
 *
 * The followings are the available model relations:
 * @property CollegesHasMajors $collegesHasMajorsColleges
 * @property CollegesHasMajors $collegesHasMajorsMajors
 * @property EssayType $typeEssay
 * @property EssaysHasCrugeUser[] $essaysHasCrugeUsers
 */
class Essays extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'essays';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('colleges_has_majors_colleges_id, colleges_has_majors_majors_id, type_essay_id, regdate', 'required'),
			array('colleges_has_majors_colleges_id, colleges_has_majors_majors_id, type_essay_id', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>2048),
			array('file_name', 'length', 'max'=>128),
			array('regdate, update', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_essays, colleges_has_majors_colleges_id, colleges_has_majors_majors_id, type_essay_id, title, file_name, regdate, update', 'safe', 'on'=>'search'),
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
			'collegesHasMajorsColleges' => array(self::BELONGS_TO, 'CollegesHasMajors', 'colleges_has_majors_colleges_id'),
			'collegesHasMajorsMajors' => array(self::BELONGS_TO, 'CollegesHasMajors', 'colleges_has_majors_majors_id'),
			'typeEssay' => array(self::BELONGS_TO, 'EssayType', 'type_essay_id'),
			'essaysHasCrugeUsers' => array(self::HAS_MANY, 'EssaysHasCrugeUser', 'essays_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_essays' => 'ID',
			'colleges_has_majors_colleges_id' => 'Nombre de College',
			'colleges_has_majors_majors_id' => 'Nombre de Major',
			'type_essay_id' => 'Tipo de Essay',
			'title' => 'Título de Essay',
			'file_name' => 'Archivo de Essay',
			'regdate' => 'Fecha de Creación',
			'update' => 'Ultima Actualización',
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

		$criteria->compare('id_essays',$this->id_essays);
		$criteria->compare('colleges_has_majors_colleges_id',$this->colleges_has_majors_colleges_id);
		$criteria->compare('colleges_has_majors_majors_id',$this->colleges_has_majors_majors_id);
		$criteria->compare('type_essay_id',$this->type_essay_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('file_name',$this->file_name,true);
		$criteria->compare('regdate',$this->regdate,true);
		$criteria->compare('update',$this->update,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	/**
	 * Retorna el nombre de un college
	 */
	public function getNameCollegeEssay($id)
	{
		return Colleges::model()->findByPk($id)->name;
	}
	
	/**
	 * Retorna el nombre de un major
	 */	
	public function getNameMajorEssay($id)
	{
		return Majors::model()->findByPk($id)->name;
	}	
	
	/**
	 * Retorna una lista de todos los colleges que tienen un essay asignado
	 */	
	public function getListCollegeEssay()
	{
		$criteria = new CDbCriteria;
		$criteria->condition = "EXISTS (SELECT * FROM essays WHERE colleges_has_majors_colleges_id = id) ORDER BY name ASC";
		
		return Colleges::model()->findAll($criteria);
	}
	
	/**
	 * Retorna una lista de todos los majors que tienen un essay asignado
	 */	
	public function getListMajorEssay()
	{
		$criteria = new CDbCriteria;
		$criteria->condition = "EXISTS (SELECT * FROM essays WHERE colleges_has_majors_majors_id = id) ORDER BY name ASC";
		
		return Majors::model()->findAll($criteria);
	}	
	
	/**
	 * Retorna una listat de todos los tipos de essay que poseen un essay
	 */	
	public function getListTypeEssay()
	{
		$criteria = new CDbCriteria;
		$criteria->condition = "EXISTS (SELECT * FROM essays WHERE type_essay_id = id) ORDER BY name ASC";
		
		return EssayType::model()->findAll($criteria);
	}	
	
	/**
	 * Retorna el nombre para el archivo del essay 
	 */	
	public function getNameFileEssay($idColleges, $idTypeEssay)
	{
		return Colleges::model()->getNameCollege($idColleges)."-".EssayType::model()->findByPk($idTypeEssay)->short_name;
	}

	public function getNameTitleEssay($id,$idColleges,$idTypeEssay,$idEssay)
	{
		$numEssay = EssaysHasCrugeUser::model()->calcularEssay($id,$idEssay,$idColleges,$idTypeEssay);
		return Students::model()->getNameShort($id)."-".$this->getNameFileEssay($idColleges, $idTypeEssay).$numEssay;
	}
	
	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Essays the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
