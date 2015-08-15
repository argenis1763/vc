<?php

/**
 * This is the model class for table "essays_has_cruge_user".
 *
 * The followings are the available columns in table 'essays_has_cruge_user':
 * @property integer $id_essay_cruge
 * @property string $title_essay
 * @property integer $status
 * @property string $stardate
 * @property string $enddate
 * @property integer $essays_id
 * @property integer $students_id
 *
 * The followings are the available model relations:
 * @property EssaysDetail[] $essaysDetails
 * @property Essays $essays
 * @property Students $students
 * @property EssaysHistorical[] $essaysHistoricals
 */
class EssaysHasCrugeUser extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'essays_has_cruge_user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title_essay, status, stardate, essays_id, students_id', 'required'),
			array('status, essays_id, students_id', 'numerical', 'integerOnly'=>true),
			array('title_essay', 'length', 'max'=>128),
			array('stardate, enddate', 'length', 'max'=>30),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id_essay_cruge, title_essay, status, stardate, enddate, essays_id, students_id', 'safe', 'on'=>'search'),
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
			'essaysDetails' => array(self::HAS_MANY, 'EssaysDetail', 'essays_has_cruge_user_id_essay_cruge'),
			'essays' => array(self::BELONGS_TO, 'Essays', 'essays_id'),
			'students' => array(self::BELONGS_TO, 'Students', 'students_id'),
			'essaysHistoricals' => array(self::HAS_MANY, 'EssaysHistorical', 'essays_has_cruge_user_id_essay_cruge'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_essay_cruge' => 'Id Essay Cruge',
			'title_essay' => 'Title Essay',
			'status' => 'Status',
			'stardate' => 'Stardate',
			'enddate' => 'Enddate',
			'essays_id' => 'Essays',
			'students_id' => 'Students',
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

		$criteria->compare('id_essay_cruge',$this->id_essay_cruge);
		$criteria->compare('title_essay',$this->title_essay,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('stardate',$this->stardate,true);
		$criteria->compare('enddate',$this->enddate,true);
		$criteria->compare('essays_id',$this->essays_id);
		$criteria->compare('students_id',$this->students_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function validarStatus($status) { 

		if($status==1){return TbHtml::labelTb("Asignado", array('color' => TbHtml::LABEL_COLOR_SUCCESS));}
		else if($status==2){return TbHtml::labelTb("Por asignar");}
		else if($status==3){return TbHtml::labelTb("Creado", array('color' => TbHtml::LABEL_COLOR_SUCCESS));}
		else if($status==4){return TbHtml::labelTb("Eliminado", array('color' => TbHtml::LABEL_COLOR_IMPORTANT));}
		else if($status==5){return TbHtml::labelTb("Cerrado", array('color' => TbHtml::LABEL_COLOR_INVERSE));}
		else if($status==6){return TbHtml::labelTb("Re abierto", array('color' => TbHtml::LABEL_COLOR_INFO));}
		else if($status==7){return TbHtml::labelTb("Corregido por tutor", array('color' => TbHtml::LABEL_COLOR_SUCCESS));}
		else if($status==8){return TbHtml::labelTb("Corregido por estudiante", array('color' => TbHtml::LABEL_COLOR_SUCCESS));}
		else if($status==9){return TbHtml::labelTb("No corregido", array('color' => TbHtml::LABEL_COLOR_WARNING));}
		else if($status==10){return TbHtml::labelTb("Aprobado", array('color' => TbHtml::LABEL_COLOR_SUCCESS));}
		else if($status==11){return TbHtml::labelTb("En emergencia", array('color' => TbHtml::LABEL_COLOR_IMPORTANT));}
		else if($status==12){return TbHtml::labelTb("Enviado", array('color' => TbHtml::LABEL_COLOR_SUCCESS));}
		else if($status==13){return TbHtml::labelTb("No enviado", array('color' => TbHtml::LABEL_COLOR_IMPORTANT));}	
		else if($status==14){return TbHtml::labelTb("Nuevo", array('color' => TbHtml::LABEL_COLOR_INFO));}		

	}	
	
	public function calcularEssay($id, $idEssay, $idCollege, $idType){
		return Yii::app()->db->createCommand("SELECT COUNT(*) FROM essays_has_cruge_user,essays WHERE students_id=".$id." AND id_essays=essays_id AND type_essay_id=".$idType." AND colleges_has_majors_colleges_id=".$idCollege)->queryScalar()+1;
	}	
	
	public function getButtonEssay($idEssay) { 
		/*return  TbHtml::submitButton('Essay',array(
                        'submit'=>array('write','id'=>$idEssay),
                        'color'=>TbHtml::BUTTON_COLOR_PRIMARY,
                        'size'=>TbHtml::BUTTON_SIZE_MINI,
                    ));*/
		return CHtml::link(TbHtml::icon(TbHtml::ICON_EYE_OPEN), array('write','id'=>$idEssay));			
	}	

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EssaysHasCrugeUser the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
