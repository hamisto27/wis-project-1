<?php

/**
 * This is the model class for table "User".
 *
 * The followings are the available columns in table 'User':
 * @property integer $UserID
 * @property integer $IsAdmin
 * @property string $Name
 * @property string $Password
 * @property string $Description
 * @property string $Time_stp
 *
 * The followings are the available model relations:
 * @property Comments[] $comments
 * @property Video[] $videos
 * @property Channel $channel
 * @property Comments[] $comments1
 * @property Video[] $videos1
 * @property Channel[] $channels
 */
class User extends CActiveRecord

{

    public function getName()
    {
        return $this->Name;
    }

    public function isAdmin(){
        return $this->IsAdmin == 1;
    }

    public function validatePassword($Password)
    {

        //$file = 'c:\Users\Pantoufle\Documents\mohamed.txt';
        //file_put_contents($file, $this->hashPassword($Password));
        //return ($Password == $this->Password);
        return ($this->Password === crypt($Password, $this->Password));
        //return CPasswordHelper::verifyPassword($Password,$this->Password);
    }

    public function hashPassword($Password)
    {
        return CPasswordHelper::hashPassword($Password);
    }

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'User';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Name, Password', 'required'),
			array('IsAdmin', 'numerical', 'integerOnly'=>true),
			array('Name, Password', 'length', 'max'=>20),
			array('Description', 'length', 'max'=>200),
			array('Time_stp', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('UserID, IsAdmin, Name, Password, Description, Time_stp', 'safe', 'on'=>'search'),
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
			'comments' => array(self::MANY_MANY, 'Comments', 'AbuseComment(UserID, CommentID)'),
			'videos' => array(self::MANY_MANY, 'Video', 'AbuseVid(UserID, VidID)'),
			'channel' => array(self::HAS_ONE, 'Channel', 'ChannelID'),
			'comments1' => array(self::HAS_MANY, 'Comments', 'UserID'),
			'videos1' => array(self::MANY_MANY, 'Video', 'Likes(UserID, VidID)'),
			'channels' => array(self::MANY_MANY, 'Channel', 'Subscription(UserID, ChannelID)'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'UserID' => 'User',
			'IsAdmin' => 'Is Admin',
			'Name' => 'Name',
			'Password' => 'Password',
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

		$criteria->compare('UserID',$this->UserID);
		$criteria->compare('IsAdmin',$this->IsAdmin);
		$criteria->compare('Name',$this->Name,true);
		$criteria->compare('Password',$this->Password,true);
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
	 * @return User the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
