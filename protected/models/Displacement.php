<?php

/**
 * This is the model class for table "displacement".
 *
 * The followings are the available columns in table 'displacement':
 * @property integer $id
 * @property string $date
 * @property integer $from_org
 * @property integer $from_room
 * @property integer $to_org
 * @property integer $to_room
 *
 * The followings are the available model relations:
 * @property Room $toRoom
 * @property Organization $fromOrg
 * @property Room $fromRoom
 * @property Organization $toOrg
 */
class Displacement extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'displacement';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('from_org, from_room, to_org, to_room', 'required'),
			array('from_org, from_room, to_org, to_room', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, date, from_org, from_room, to_org, to_room', 'safe', 'on'=>'search'),
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
			'toRoom' => array(self::BELONGS_TO, 'Room', 'to_room'),
			'fromOrg' => array(self::BELONGS_TO, 'Organization', 'from_org'),
			'fromRoom' => array(self::BELONGS_TO, 'Room', 'from_room'),
			'toOrg' => array(self::BELONGS_TO, 'Organization', 'to_org'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'date' => 'Date',
			'from_org' => 'From Org',
			'from_room' => 'From Room',
			'to_org' => 'To Org',
			'to_room' => 'To Room',
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
		$criteria->compare('date',$this->date,true);
		$criteria->compare('from_org',$this->from_org);
		$criteria->compare('from_room',$this->from_room);
		$criteria->compare('to_org',$this->to_org);
		$criteria->compare('to_room',$this->to_room);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Displacement the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
