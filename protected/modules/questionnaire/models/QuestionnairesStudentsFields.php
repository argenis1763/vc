<?php

/**
 * This is the model class for table "questionnaires_students_fields".
 *
 * The followings are the available columns in table 'questionnaires_students_fields':
 * @property integer $id
 * @property string $est1
 * @property string $est2
 * @property string $est3
 * @property string $est4
 * @property string $est5
 * @property string $est6
 * @property string $est7
 * @property string $est8
 * @property integer $questionnaires_id
 *
 * The followings are the available model relations:
 * @property Questionnaires $questionnaires
 */
class QuestionnairesStudentsFields extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'questionnaires_students_fields';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('questionnaires_id', 'numerical', 'integerOnly'=>true),
			array('est1, est2, est3, est4, est5, est6, est7, est8', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, est1, est2, est3, est4, est5, est6, est7, est8, questionnaires_id', 'safe', 'on'=>'search'),
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
			'est1' => '1). Deporte',
			'est2' => '2). Hobby (Fotografías, ajedrez, arte)',
			'est3' => '3). Mun',
			'est4' => '4). Planchas Estudiantiles',
			'est5' => '5). Charities, Misiones, Serviam',
			'est6' => '6). Idiomas',
			'est7' => '7). Música / Canto',
			'est8' => 'Otra actividad relevante',
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
		$criteria->compare('est1',$this->est1,true);
		$criteria->compare('est2',$this->est2,true);
		$criteria->compare('est3',$this->est3,true);
		$criteria->compare('est4',$this->est4,true);
		$criteria->compare('est5',$this->est5,true);
		$criteria->compare('est6',$this->est6,true);
		$criteria->compare('est7',$this->est7,true);
		$criteria->compare('est8',$this->est8,true);
		$criteria->compare('questionnaires_id',$this->questionnaires_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return QuestionnairesStudentsFields the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
