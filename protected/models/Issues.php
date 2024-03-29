<?php

/**
 * This is the model class for table "sys_issues".
 *
 * The followings are the available columns in table 'sys_issues':
 * @property string $id
 * @property string $title
 * @property string $content
 * @property integer $add_time
 * @property integer $update_time
 * @property integer $user_id
 */
class Issues extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Issues the static model class
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
		return 'sys_issues';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('add_time, update_time, user_id,finished', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>50),
			array('content', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, content, add_time, update_time, user_id,finished', 'safe', 'on'=>'search'),
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
		'user'=>array(self::BELONGS_TO,'Users','user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => Yii::t('project','ID'),
			'title' => Yii::t('project','Title'),
			'content' => Yii::t('project','Content'),
			'add_time' => Yii::t('project','Add Time'),
			'update_time' => Yii::t('project','Update Time'),
			'user_id' => Yii::t('project','Issues User'),
			'finished'=>Yii::t('project','Issues Finished'),
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('add_time',$this->add_time);
		$criteria->compare('update_time',$this->update_time);
		$criteria->compare('user_id',$this->user_id);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	
	protected function beforeSave(){
		if(parent::beforeSave()){
			if($this->getIsNewRecord())
				$this->add_time=time();
			else
				$this->update_time=time();
			return true;
		}else{
			return false;
		}
	}
	
}
