<?php

/**
 * This is the model class for table "questionnaires_parents_fields".
 *
 * The followings are the available columns in table 'questionnaires_parents_fields':
 * @property integer $id
 * @property string $pad1
 * @property string $pad2
 * @property string $pad3
 * @property string $pad4
 * @property string $pad5
 * @property string $pad6
 * @property string $pad7
 * @property string $pad8
 * @property string $pad9
 * @property string $pad10
 * @property string $pad11
 * @property string $pad12
 * @property string $pad13
 * @property string $pad14
 * @property string $pad15
 * @property string $pad16
 * @property string $pad17
 * @property integer $questionnaires_id
 *
 * The followings are the available model relations:
 * @property Questionnaires $questionnaires
 */
class QuestionnairesParentsFields extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'questionnaires_parents_fields';
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
			array('pad1, pad2, pad3, pad4, pad5, pad6, pad7, pad8, pad9, pad10, pad11, pad12, pad13, pad14, pad15, pad16, pad17', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, pad1, pad2, pad3, pad4, pad5, pad6, pad7, pad8, pad9, pad10, pad11, pad12, pad13, pad14, pad15, pad16, pad17, questionnaires_id', 'safe', 'on'=>'search'),
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
			'pad1' => '1). Enumere aquellas zonas dentro de los Estados Unidos donde prefiere que su que su hija/hijo realice sus estudios universitarios.',
			'pad2' => '2). Estime el presupuesto anual que maneja la familia para el pago del tuition del estudiante. ',
			'pad3' => '3). Esta usted al tanto de la providencia de CADIVI que limita las áreas de estudio en el extranjero?',
			'pad4' => '4). La carrera que esta considerando su hija/o esta dentro de las áreas prioritarias de Cadivi.',
			'pad5' => '5). Posee la familia algún “legacie” (padres o abuelos que hayan estudiado en alguna institución o tiene alguna preferencia particular por alguna institución o instituciones que desee sean consideradas para  el proceso de aplicación del estudiante en ese enumerare sus instituciones fa',
			'pad6' => '6). Como considera la experiencia escolar de su hija/o en cuanto a el aspecto social, académico, deportivo. Le parece que ha sido positiva, si hubiese podido mejorar algún aspecto cual seria y a que factor atribuye la responsabilidad de no haber llenado sus expectativas como padre?',
			'pad7' => '7). Señale sus preferencia acerca de las instituciones académicas:',
			'pad8' => '8). Describa la experiencia universitaria que aspira, enumere las prioridades, características, y metas que en su carácter de padres o representantes aspiran concretar de esta experiencia académica.',
			'pad9' => '9). Ha tenido la familia experiencias universitarias en alguna institución que desee repetir o prefiera descartar? Describa:',
			'pad10' => '10). Con respecto al Housing prefiere que el estudiante viva dentro de los dormitorios estudiantiles (in campus), prefiere alquilar un apartamento (off campus). 
O por el contrario tiene familiares, amigos o parientes donde el estudiante pueda vivir.',
			'pad11' => '11). Los deportes e instalaciones deportivas son relevantes a la hora de la selección de la institución universitaria?
Que deportes espera la institución académica incluya?
La familia tiene algún Varsity ( fanático de algún equipo deportivo de College Universitario) que deba ser considerado o incluido en el reporte de Colleges y Universidades que Via-College entregara a el estudiante y su f',
			'pad12' => '12). En base a su relación cercana al estudiante hay alguna sugerencia que desee comunicar en torno a la selección del “Major” o el “College”. 
Es muy importante para nosotros sumar toda la información posible con la finalidad de brindar las mas asertiva guía a nuestros estudiantes.
Cuando era pequeño que carreras imagino estudiaría de ma',
			'pad13' => '13). Tiene alguna sugerencia que considere importante realizar en cuanto a la personalidad y gustos de su hija/o que quiera hacer de nuestro conocimiento y desee sea considerado en la evaluación de instituciones educativas?',
			'pad14' => '14). El estudiante presenta alguna necesidad medica, psicológica, nutricional que deba ser considerada?',
			'pad15' => '15). Cual ambiente considera ideal para el estudio de su hija/o . Al estar en casa cual es su manera de estudiar?',
			'pad16' => '16). En cuanto a su participación en clases cree que se manejara mejor en clases pequeñas, o puede participar cómodamente en clases en auditóriums grandes sin temor a que pueda sentirse intimidado o su seguridad se vea afectada por la cantidad de gente?',
			'pad17' => '17). En el área académica, su hijo a sido una persona eficiente y organizada, o ha necesitado de guía y apoyo constante durante su trayectoria escolar?',
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
		$criteria->compare('pad1',$this->pad1,true);
		$criteria->compare('pad2',$this->pad2,true);
		$criteria->compare('pad3',$this->pad3,true);
		$criteria->compare('pad4',$this->pad4,true);
		$criteria->compare('pad5',$this->pad5,true);
		$criteria->compare('pad6',$this->pad6,true);
		$criteria->compare('pad7',$this->pad7,true);
		$criteria->compare('pad8',$this->pad8,true);
		$criteria->compare('pad9',$this->pad9,true);
		$criteria->compare('pad10',$this->pad10,true);
		$criteria->compare('pad11',$this->pad11,true);
		$criteria->compare('pad12',$this->pad12,true);
		$criteria->compare('pad13',$this->pad13,true);
		$criteria->compare('pad14',$this->pad14,true);
		$criteria->compare('pad15',$this->pad15,true);
		$criteria->compare('pad16',$this->pad16,true);
		$criteria->compare('pad17',$this->pad17,true);
		$criteria->compare('questionnaires_id',$this->questionnaires_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return QuestionnairesParentsFields the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
