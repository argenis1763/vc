<?php

/**
 * This is the model class for table "majors".
 *
 * The followings are the available columns in table 'majors':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $categories_majors_id
 *
 * The followings are the available model relations:
 * @property Colleges[] $colleges
 * @property CategoriesMajors $categoriesMajors
 */
class Majors extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'majors';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, categories_majors_id', 'required'),
			array('categories_majors_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>256),
			array('description', 'length', 'max'=>11000),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, description, categories_majors_id', 'safe', 'on'=>'search'),
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
			'colleges' => array(self::MANY_MANY, 'Colleges', 'colleges_has_majors(majors_id, colleges_id)'),
			'categoriesMajors' => array(self::BELONGS_TO, 'CategoriesMajors', 'categories_majors_id'),
			'collegesHasMajors'=>array(self::HAS_MANY, 'CollegesHasMajors', 'majors_id'),
		);
	}
	
    public function behaviors(){
            return array(
                    'CSaveRelationsBehavior' => array(
                            'class' => 'CSaveRelationsBehavior',
                            'relations' => array(
                                    'colleges'=>array("message"=>"Please, check the colleges"),
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
			'id' => 'ID',
			'name' => 'Nombre',
			'description' => 'Descripción',
			'categories_majors_id' => 'Categoría',
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
		$criteria->compare('description',$this->description,true);
		$criteria->compare('categories_majors_id',$this->categories_majors_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria, 
                        'pagination'=>array('pageSize'=>20),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Majors the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
