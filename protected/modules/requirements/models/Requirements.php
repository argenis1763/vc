<?php

/**
 * This is the model class for table "requirements".
 *
 * The followings are the available columns in table 'requirements':
 * @property integer $id
 * @property string $create_date
 * @property string $last_update
 * @property integer $colleges_id
 *
 * The followings are the available model relations:
 * @property Colleges $colleges
 * @property RequirementsFields[] $requirementsFields
 * @property Students[] $students
 */
class Requirements extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'requirements';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('colleges_id', 'required'),
            array('colleges_id', 'numerical', 'integerOnly'=>true),
            array('create_date, last_update', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, create_date, last_update, colleges_id', 'safe', 'on'=>'search'),
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
            'colleges' => array(self::BELONGS_TO, 'Colleges', 'colleges_id'),
            'requirementsFields' => array(self::MANY_MANY, 'RequirementsFields', 'requirements_has_requirements_fields(requirements_id, requirements_fields_id)'),
            'students' => array(self::HAS_MANY, 'Students', 'requirements_id'),
            'requirementsHasRequirementsFields'=>array(self::HAS_MANY, 'RequirementsHasRequirementsFields', 'requirements_id'),
        );
    }

    public function behaviors(){
            return array(
                    'CSaveRelationsBehavior' => array(
                            'class' => 'CSaveRelationsBehavior',
                            'relations' => array(
                                    'colleges'=>array("message"=>"Please, check the colleges"),
                                    'requirimentsFields'=>array("message"=>"Please, check the requeriments fields"),
                                    'requirementsHasRequirementsFields'=>array("message"=>"Please, check the requeriments fields"),
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
            'create_date' => 'Fecha de creación',
            'last_update' => 'Última actualización',
            'colleges_id' => 'College',
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
        $criteria->compare('create_date',$this->create_date,true);
        $criteria->compare('last_update',$this->last_update,true);
        $criteria->compare('colleges_id',$this->colleges_id);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

	public function getLinkRequirement($idRequirement, $idStudent) { 
		return  CHtml::link('Ver / Generar PDF',
					   //array('requirements/report/idr/$model->id/ids/$student->id'),
					   //array('essays/Generate/pdf?id='.$idEssay),
					   array("requirements/report/idr/$idRequirement/ids/$idStudent"),
					   array('target'=>'_blank'));
	}	

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Requirements the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}