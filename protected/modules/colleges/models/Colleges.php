<?php

/**
 * This is the model class for table "colleges".
 *
 * The followings are the available columns in table 'colleges':
 * @property integer $id
 * @property string $name
 * @property integer $state_id_state
 *
 * The followings are the available model relations:
 * @property State $stateIdState
 * @property Majors[] $majors
 * @property Requirements[] $requirements
 */
class Colleges extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'colleges';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, state_id_state', 'required'),
			array('id, state_id_state', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>128),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, state_id_state', 'safe', 'on'=>'search'),
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
			'stateIdState' => array(self::BELONGS_TO, 'State', 'state_id_state'),
			'majors' => array(self::MANY_MANY, 'Majors', 'colleges_has_majors(colleges_id, majors_id)', 'order'=>'name ASC'),
			'requirements' => array(self::HAS_MANY, 'Requirements', 'colleges_id'),
			'collegesHasMajors'=>array(self::HAS_MANY, 'CollegesHasMajors', 'colleges_id'),
		);
	}
	
    public function behaviors(){
            return array(
                    'CSaveRelationsBehavior' => array(
                            'class' => 'CSaveRelationsBehavior',
                            'relations' => array(
                                    'majors'=>array("message"=>"Please, check the colleges"),
                            )
                    )
            );
    }	

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'College',
			'name' => 'Nombre',
			'state_id_state' => 'Estado',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('state_id_state',$this->state_id_state);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        //'pagination'=>array('pageSize'=>20),
		));
	}
	
	public function getTypeCollege($id)
	{
		$name = strtoupper(Colleges::model()->findByPk($id)->name);
		//$resultado = strpos($name, "UNIVERSITY");
		if(strpos($name, "UNIVERSITY") !== FALSE) 
		{ 
			return "U";
		} else if(strpos($name, "COLLEGE") !== FALSE)
			{
				return "C";
			}else if(strpos($name, "SCHOOL") !== FALSE)
			{
				return "S";
			}else if(strpos($name, "INSTITUTE") !== FALSE)
				{
					return "I";
				}else if(strpos($name, "POLITECHNIC") !== FALSE)
					{
						return "P";
					}		
		return "O";
	}
	
	public function getNameCollege($id)
	{
		//$name = stristr(Colleges::model()->findByPk($id)->name, 'university', true);
		$condicion = array('university', 'college', 'school', 'institute', 'politechnic', 'of', ',');
		$name = trim(str_replace($condicion, ' ', strtolower(Colleges::model()->findByPk($id)->name)));
		return strtoupper($name)."-".$this->getTypeCollege($id);
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Colleges the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
