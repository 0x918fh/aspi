<?php

/**
 * This is the model class for table "device".
 *
 * The followings are the available columns in table 'device':
 * @property integer $id
 * @property integer $org_id
 * @property integer $room_id
 * @property integer $nGroup_id
 * @property integer $nomenclature_id
 * @property integer $vendor_id
 * @property string $accountancy_name
 * @property string $serial_num
 * @property string $inv_num
 * @property string $comment
 *
 * The followings are the available model relations:
 * @property Room $room
 * @property Nomenclature $nomenclature
 */
class Device extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'device';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('org_id, room_id, nGroup_id, nomenclature_id, vendor_id, accountancy_name, serial_num, inv_num, comment', 'required'),
			array('org_id, room_id, nGroup_id, nomenclature_id, vendor_id', 'numerical', 'integerOnly'=>true),
			array('accountancy_name, serial_num, inv_num', 'length', 'max'=>128),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, org_id, room_id, nGroup_id, nomenclature_id, vendor_id, accountancy_name, serial_num, inv_num, comment', 'safe', 'on'=>'search'),
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
			'room' => array(self::BELONGS_TO, 'Room', 'room_id'),
			'nomenclature' => array(self::BELONGS_TO, 'Nomenclature', 'nomenclature_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'org_id' => 'Org',
			'room_id' => 'Room',
			'nGroup_id' => 'N Group',
			'nomenclature_id' => 'Nomenclature',
			'vendor_id' => 'Vendor',
			'accountancy_name' => 'Accountancy Name',
			'serial_num' => 'Serial Num',
			'inv_num' => 'Inv Num',
			'comment' => 'Comment',
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
		$criteria->compare('org_id',$this->org_id);
		$criteria->compare('room_id',$this->room_id);
		$criteria->compare('nGroup_id',$this->nGroup_id);
		$criteria->compare('nomenclature_id',$this->nomenclature_id);
		$criteria->compare('vendor_id',$this->vendor_id);
		$criteria->compare('accountancy_name',$this->accountancy_name,true);
		$criteria->compare('serial_num',$this->serial_num,true);
		$criteria->compare('inv_num',$this->inv_num,true);
		$criteria->compare('comment',$this->comment,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Device the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
