<?php

/**
 * This is the model class for table "photo".
 *
 * The followings are the available columns in table 'photo':
 * @property integer $id
 * @property string $extension
 * @property string $photo_name
 * @property integer $type
 * @property integer $profile_id
 * @property integer $album_id
 *
 * The followings are the available model relations:
 * @property Albums $album
 * @property Profile $profile
 */
class Photo extends CActiveRecord
{
    public $photo_file;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Photo the static model class
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
		return 'photo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
            array('extension, photo_name, type', 'required'),
            array('extension', 'length', 'max'=>5),
            array('photo_name', 'length', 'max'=>35),
			array('type, profile_id, album_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, type, profile_id, album_id', 'safe', 'on'=>'search'),
            array('photo_file', 'file', 'types'=>'jpg, png', 'on'=>'upload'),
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
			'album' => array(self::BELONGS_TO, 'Albums', 'album_id'),
			'profile' => array(self::BELONGS_TO, 'Profile', 'profile_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'type' => 'Type',
			'profile_id' => 'Profile',
			'album_id' => 'Album',
		);
	}

    public function iOwner($id)
    {
        if(!Yii::app()->user->isGuest){
            $user = Users::model()->findByPk(Yii::app()->user->id);
            if($id == $user->profile_id){
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
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
        $criteria->compare('extension',$this->extension,true);
        $criteria->compare('photo_name',$this->photo_name,true);
		$criteria->compare('type',$this->type);
		$criteria->compare('profile_id',$this->profile_id);
		$criteria->compare('album_id',$this->album_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}