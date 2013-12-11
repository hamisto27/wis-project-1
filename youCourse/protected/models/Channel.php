<?php

/**
 * This is the model class for table "Channel".
 *
 * The followings are the available columns in table 'Channel':
 * @property integer $ChannelID
 * @property integer $Coordinates
 * @property string $Description
 * @property string $Time_stp
 *
 * The followings are the available model relations:
 * @property User $channel
 * @property GeoCodes $coordinates
 * @property User[] $users
 * @property Video[] $videos
 */
class Channel extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Channel';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Coordinates', 'numerical', 'integerOnly'=>true),
			array('Description', 'length', 'max'=>200),
			array('Time_stp', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ChannelID, Coordinates, Description, Time_stp', 'safe', 'on'=>'search'),
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
			'channel' => array(self::BELONGS_TO, 'User', 'ChannelID'),
			'coordinates' => array(self::BELONGS_TO, 'GeoCodes', 'Coordinates'),
			'users' => array(self::MANY_MANY, 'User', 'Subscription(ChannelID, id)'),
			'videos' => array(self::HAS_MANY, 'Video', 'ChannelID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ChannelID' => 'Channel',
			'Coordinates' => 'Coordinates',
			'Description' => 'Description',
			'Time_stp' => 'Time Stp',
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

		$criteria->compare('ChannelID',$this->ChannelID);
		$criteria->compare('Coordinates',$this->Coordinates);
		$criteria->compare('Description',$this->Description,true);
		$criteria->compare('Time_stp',$this->Time_stp,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Channel the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}