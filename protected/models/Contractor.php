<?php

/**
 * This is the model class for table "contractor".
 *
 * The followings are the available columns in table 'contractor':
 * @property integer $id
 * @property string $name
 * @property string $fio
 * @property string $tel
 * @property string $email
 * @property string $url
 * @property string $address
 * @property string $inn
 * @property string $bik
 * @property string $ogrn
 * @property string $pa
 * @property string $ca
 * @property string $bank
 */
class Contractor extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'contractor';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, fio, tel, email, url, address, inn, bik, ogrn, pa, ca, bank', 'required'),
			array('name, fio', 'length', 'max'=>128),
			array('tel, email, bik, ogrn, pa, ca, bank', 'length', 'max'=>32),
			array('url', 'length', 'max'=>64),
			array('inn', 'length', 'max'=>12),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, name, fio, tel, email, url, address, inn, bik, ogrn, pa, ca, bank', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Название',
			'fio' => 'Контактное лицо',
			'tel' => 'Телефон',
			'email' => 'E-mail',
			'url' => 'Сайт',
			'address' => 'Адрес',
			'inn' => 'ИНН',
			'bik' => 'БИК',
			'ogrn' => 'ОГРН',
			'pa' => 'Лицевой счет',
			'ca' => 'Расчетный счет',
			'bank' => 'Банк',
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
		$criteria->compare('fio',$this->fio,true);
		$criteria->compare('tel',$this->tel,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('inn',$this->inn,true);
		$criteria->compare('bik',$this->bik,true);
		$criteria->compare('ogrn',$this->ogrn,true);
		$criteria->compare('pa',$this->pa,true);
		$criteria->compare('ca',$this->ca,true);
		$criteria->compare('bank',$this->bank,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Contractor the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
