<?php

/**
 * This is the model class for table "profile".
 *
 * The followings are the available columns in table 'profile':
 * @property integer $id
 * @property string $first_name
 * @property string $second_name
 * @property string $third_name
 * @property string $fourth_name
 * @property integer $group_id
 * @property string $city
 * @property string $profession
 * @property string $profile_photo
 * @property string $icq
 * @property string $skype
 * @property string $mobile
 * @property string $about
 *
 * The followings are the available model relations:
 * @property Groups $group
 * @property Users[] $users
 */
class Profile extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Profile the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'profile';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, first_name, second_name, group_id, city', 'required'),
			array('id, group_id', 'numerical', 'integerOnly'=>true),
			array('first_name, second_name, third_name, fourth_name, mobile', 'length', 'max'=>24),
			array('city, profile_photo, skype', 'length', 'max'=>35),
			array('profession', 'length', 'max'=>65),
			array('icq', 'length', 'max'=>9),
			array('about', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, first_name, second_name, third_name, fourth_name, group_id, city, profession, profile_photo, icq, skype, mobile, about', 'safe', 'on'=>'search'),
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
			'group' => array(self::BELONGS_TO, 'Groups', 'group_id'),
			'users' => array(self::HAS_MANY, 'Users', 'profile_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'first_name' => 'First Name',
			'second_name' => 'Second Name',
			'third_name' => 'Third Name',
			'fourth_name' => 'Fourth Name',
			'group_id' => 'Group',
			'city' => 'City',
			'profession' => 'Profession',
			'profile_photo' => 'Profile Photo',
			'icq' => 'Icq',
			'skype' => 'Skype',
			'mobile' => 'Mobile',
			'about' => 'About',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('second_name',$this->second_name,true);
		$criteria->compare('third_name',$this->third_name,true);
		$criteria->compare('fourth_name',$this->fourth_name,true);
		$criteria->compare('group_id',$this->group_id);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('profession',$this->profession,true);
		$criteria->compare('profile_photo',$this->profile_photo,true);
		$criteria->compare('icq',$this->icq,true);
		$criteria->compare('skype',$this->skype,true);
		$criteria->compare('mobile',$this->mobile,true);
		$criteria->compare('about',$this->about,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}