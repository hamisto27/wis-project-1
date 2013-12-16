<?php

/**
 * This is the model class for table "Video".
 *
 * The followings are the available columns in table 'Video':
 * @property integer $VidID
 * @property string $Content
 * @property string $Description
 * @property string $Name
 * @property integer $Views
 * @property integer $ChannelID
 * @property string $Time_stp
 *
 * The followings are the available model relations:
 * @property User[] $users
 * @property Comment[] $comments
 * @property Channel $channel
 */
class Video extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Video';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Content, Name, ChannelID, Time_stp', 'required'),
			array('Views, ChannelID', 'numerical', 'integerOnly'=>true),
			array('Content', 'length', 'max'=>50),
			array('Description', 'length', 'max'=>1000),
			array('Name', 'length', 'max'=>200),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('VidID, Content, Description, Name, Views, ChannelID, Time_stp', 'safe', 'on'=>'search'),
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
			'users' => array(self::MANY_MANY, 'User', 'Likes(VidID, id)'),
			//'comments' => array(self::HAS_MANY, 'Comment', 'VidID'),
			'channel' => array(self::BELONGS_TO, 'Channel', 'ChannelID'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'VidID' => 'Vid',
			'Content' => 'Content',
			'Description' => 'Description',
			'Name' => 'Name',
			'Views' => 'Views',
			'ChannelID' => 'Channel',
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

		$criteria->compare('VidID',$this->VidID);
		$criteria->compare('Content',$this->Content,true);
		$criteria->compare('Description',$this->Description,true);
		$criteria->compare('Name',$this->Name,true);
		$criteria->compare('Views',$this->Views);
		$criteria->compare('ChannelID',$this->ChannelID);
		//$criteria->compare('longLocation',$this->longLocation,true);
		//$criteria->compare('latLocation',$this->latLocation,true);
		//$criteria->compare('Time_stp',$this->Time_stp,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Video the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
