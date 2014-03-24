<?php

/**
 * This is the model class for table "room".
 *
 * The followings are the available columns in table 'room':
 * @property integer $id
 * @property integer $organization_id
 * @property string $name
 * @property string $comment
 * @property string $svg
 *
 * The followings are the available model relations:
 * @property Device[] $devices
 * @property Displacement[] $displacements
 * @property Displacement[] $displacements1
 * @property Organization $organization
 * @property User[] $users
 */
class Room extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'room';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('organization_id, name', 'required'),
			array('organization_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>128),
			array('comment, svg', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, organization_id, name, comment, svg', 'safe', 'on'=>'search'),
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
			'devices' => array(self::HAS_MANY, 'Device', 'room_id'),
			'displacements' => array(self::HAS_MANY, 'Displacement', 'to_room'),
			'displacements1' => array(self::HAS_MANY, 'Displacement', 'from_room'),
			'organization' => array(self::BELONGS_TO, 'Organization', 'organization_id'),
			'users' => array(self::HAS_MANY, 'User', 'room_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'organization_id' => 'Organization',
			'name' => 'Name',
			'comment' => 'Comment',
			'svg' => 'Svg',
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
		$criteria->compare('organization_id',$this->organization_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('comment',$this->comment,true);
		$criteria->compare('svg',$this->svg,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getArray($condition){
		$res = Array();
		if ($condition == NULL)
			$record = Array();
		else
			$record = Room::model()->findAll('organization_id = :id', Array(':id' => $condition));
		foreach($record as $row){
			$res[$row->id] = $row->name;
		}
		return $res;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Room the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
