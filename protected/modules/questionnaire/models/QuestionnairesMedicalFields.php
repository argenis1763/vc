<?php

/**
 * This is the model class for table "questionnaires_medical_fields".
 *
 * The followings are the available columns in table 'questionnaires_medical_fields':
 * @property integer $id
 * @property string $as1
 * @property integer $as2
 * @property string $as2_indicate
 * @property string $as3_hearing
 * @property string $as4_visual
 * @property string $as5_dreams_or_sleep
 * @property string $as6_practices_sport
 * @property string $as7_lost_memory
 * @property integer $as8
 * @property integer $as9
 * @property integer $as10
 * @property string $as11
 * @property integer $questionnaires_id
 *
 * The followings are the available model relations:
 * @property Questionnaires $questionnaires
 */
class QuestionnairesMedicalFields extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'questionnaires_medical_fields';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('as2, as8, as9, as10, questionnaires_id', 'numerical', 'integerOnly'=>true),
			array('as1, as2_indicate, as3_hearing, as4_visual, as5_dreams_or_sleep, as6_practices_sport, as7_lost_memory, as11', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, as1, as2, as2_indicate, as3_hearing, as4_visual, as5_dreams_or_sleep, as6_practices_sport, as7_lost_memory, as8, as9, as10, as11, questionnaires_id', 'safe', 'on'=>'search'),
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
			'questionnaires' => array(self::BELONGS_TO, 'Questionnaires', 'questionnaires_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'as1' => '1). Padece o ha padecido alguna de las siguientes enfermedades: (Seleccione en caso de respuesta afirmativa)',
			'as2' => '2). Toma medicamentos en forma permanente',
			'as2_indicate' => '3). Indique el nombre de la medicación y duración del tratamiento',
			'as3_hearing' => '4). Auditivo ¿Cuál?',
			'as4_visual' => '5). Visual ¿Cuál?',
			'as5_dreams_or_sleep' => '6). Del Sueños o al dormir ¿Cuál?',
			'as6_practices_sport' => '7). En la práctica de deportes ¿Cuál?',
			'as7_lost_memory' => '8). De pérdida de conocimiento',
			'as8' => '9). ¿Padece algún tipo de dificultad en clase (de lenguaje, de vista, dislexia...)? ',
			'as9' => '10). ¿Requiere atención nocturna especial (insomnio, enuresis, sonámbulo...)? ',
			'as10' => '11). ¿Requiere atención especial debido a alguna circunstancia familiar reciente, o debido a su carácter? ',
			'as11' => '12). ¿Tiene otras indicaciones que le parezcan importantes indicar?',
			'questionnaires_id' => 'Questionnaires',
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
		$criteria->compare('as1',$this->as1,true);
		$criteria->compare('as2',$this->as2);
		$criteria->compare('as2_indicate',$this->as2_indicate,true);
		$criteria->compare('as3_hearing',$this->as3_hearing,true);
		$criteria->compare('as4_visual',$this->as4_visual,true);
		$criteria->compare('as5_dreams_or_sleep',$this->as5_dreams_or_sleep,true);
		$criteria->compare('as6_practices_sport',$this->as6_practices_sport,true);
		$criteria->compare('as7_lost_memory',$this->as7_lost_memory,true);
		$criteria->compare('as8',$this->as8);
		$criteria->compare('as9',$this->as9);
		$criteria->compare('as10',$this->as10);
		$criteria->compare('as11',$this->as11,true);
		$criteria->compare('questionnaires_id',$this->questionnaires_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return QuestionnairesMedicalFields the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
