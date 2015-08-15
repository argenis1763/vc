<?php

/**
 * This is the model class for table "requirements_has_requirements_fields".
 *
 * The followings are the available columns in table 'requirements_has_requirements_fields':
 * @property integer $requirements_id
 * @property integer $requirements_fields_id
 * @property string $description1
 * @property string $description2
 * @property string $type_image
 */
class RequirementsHasRequirementsFields extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'requirements_has_requirements_fields';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('requirements_id, requirements_fields_id', 'required'),
			array('requirements_id, requirements_fields_id', 'numerical', 'integerOnly'=>true),
			array('type_image', 'length', 'max'=>45),
			array('description1, description2', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('requirements_id, requirements_fields_id, description1, description2, type_image', 'safe', 'on'=>'search'),
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
                    'requirementsFields'=>array(self::BELONGS_TO, 'RequirementsFields', 'requirements_fields_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'requirements_id' => 'Requisitos',
			'requirements_fields_id' => 'Campos para el requisito',
			'description1' => 'Descripción',
			'description2' => 'Imágen',
			'type_image' => 'Tipo de imágen',
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

		$criteria->compare('requirements_id',$this->requirements_id);
		$criteria->compare('requirements_fields_id',$this->requirements_fields_id);
		$criteria->compare('description1',$this->description1,true);
		$criteria->compare('description2',$this->description2,true);
		$criteria->compare('type_image',$this->type_image,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return RequirementsHasRequirementsFields the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
