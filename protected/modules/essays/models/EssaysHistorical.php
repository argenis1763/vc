<?php

/**
 * This is the model class for table "essays_historical".
 *
 * The followings are the available columns in table 'essays_historical':
 * @property integer $id
 * @property string $content
 * @property string $lastdate
 * @property string $file_name
 * @property string $version
 * @property integer $essays_has_cruge_user_id_essay_cruge
 *
 * The followings are the available model relations:
 * @property EssaysHasCrugeUser $essaysHasCrugeUserIdEssayCruge
 */
class EssaysHistorical extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'essays_historical';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('essays_has_cruge_user_id_essay_cruge', 'required'),
			array('essays_has_cruge_user_id_essay_cruge', 'numerical', 'integerOnly'=>true),
			array('lastdate', 'length', 'max'=>30),
			array('file_name', 'length', 'max'=>128),
			array('version', 'length', 'max'=>45),
			array('content', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, content, lastdate, file_name, version, essays_has_cruge_user_id_essay_cruge', 'safe', 'on'=>'search'),
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
			'essaysHasCrugeUserIdEssayCruge' => array(self::BELONGS_TO, 'EssaysHasCrugeUser', 'essays_has_cruge_user_id_essay_cruge'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'content' => 'Content',
			'lastdate' => 'Lastdate',
			'file_name' => 'File Name',
			'version' => 'Version',
			'essays_has_cruge_user_id_essay_cruge' => 'Essays Has Cruge User Id Essay Cruge',
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
		$criteria->compare('content',$this->content,true);
		$criteria->compare('lastdate',$this->lastdate,true);
		$criteria->compare('file_name',$this->file_name,true);
		$criteria->compare('version',$this->version,true);
		$criteria->compare('essays_has_cruge_user_id_essay_cruge',$this->essays_has_cruge_user_id_essay_cruge);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getLinkCorr($file,$version) { 
		$name=explode(".",$file);
		$name=$name[0];
		$pos = strrpos($name,'-');
		$ver = substr($name, $pos+1, strlen($name));
		/*echo "<pre>";
		echo print_r($ver);
		echo "</pre>";*/
		
		if($ver == "CORR"){
			//return CHtml::link(CHtml::encode('Descargar'), 'http://'.$_SERVER['SERVER_NAME'].Yii::app()->baseUrl.'/uploads/' . $file /*. '.pdf'*/,array('target'=>'_blank'));
			//return CHtml::link(CHtml::encode('Descargar'), array('download','name'=>$file));
			return CHtml::link('Descargar',
					   //array('requirements/report/idr/$model->id/ids/$student->id'),
					   array('essayStudents/download?file='.urlencode($file)),
					   array('target'=>'_blank'));			
		}else if($version == "VF"){
			return EssaysHasCrugeUser::model()->validarStatus(10);
		/*}else if($version == "VF"){
			return  CHtml::link('Ver / Generar Essay',
						   //array('requirements/report/idr/$model->id/ids/$student->id'),
						   array('#'),
						   array('target'=>'_blank'));*/
		}
		return EssaysHasCrugeUser::model()->validarStatus(9);
	}

	public function getLinkEssay($idEssay) { 
		return  CHtml::link('Generar PDF',
					   //array('requirements/report/idr/$model->id/ids/$student->id'),
					   array('essays/Generate/pdf?id='.$idEssay),
					   array('target'=>'_blank'));
	}	
	
	public function calcularVersion($id){
		return "V".Yii::app()->db->createCommand("SELECT COUNT(*) FROM essays_historical WHERE essays_has_cruge_user_id_essay_cruge=".$id)->queryScalar();
	}
	
	public function nameFile($file){
		$name=explode(".",$file);
		return strtoupper($name[0]);
	}	
	
	public function encrypt($string) {
		$key = "via-college";
		$result = "";
		for($i=0; $i<strlen($string); $i++) {
			$char = substr($string, $i, 1);
			$keychar = substr($key, ($i % strlen($key))-1, 1);
			$char = chr(ord($char)+ord($keychar));
			$result.=$char;
		}
		return base64_encode($result);
    }	
	
    public function decrypt($string) {
		$key = "via-college";
		$result = "";
		$string = base64_decode($string);
		for($i=0; $i<strlen($string); $i++) {
			$char = substr($string, $i, 1);
			$keychar = substr($key, ($i % strlen($key))-1, 1);
			$char = chr(ord($char)-ord($keychar));
			$result.=$char;
		}
		return $result;
    }	

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return EssaysHistorical the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
