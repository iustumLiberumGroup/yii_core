<?php

/**
 * This is the model class for table "{{key}}".
 *
 * The followings are the available columns in table '{{key}}':
 * @property integer $id
 * @property integer $user_id
 * @property string $key
 * @property integer $create_date
 * @property integer $type
 */
class Key extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Key the static model class
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
		return '{{key}}';
	}

	public function BeforeSave()
	{
		if ( $this->isNewRecord ) {
			$this->create_date  = time();	
		}
		return parent::beforeSave();
	}



	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, key', 'required'),
			array('user_id, create_date, type', 'numerical', 'integerOnly'=>true),
			array('key', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, key, create_date, type', 'safe', 'on'=>'search'),
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
			'user_id' => 'User',
			'key' => 'Key',
			'create_date' => 'Create Date',
			'type' => 'Type',
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('key',$this->key,true);
		$criteria->compare('create_date',$this->create_date);
		$criteria->compare('type',$this->type);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}
