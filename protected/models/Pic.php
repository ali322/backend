<?php

/**
 * This is the model class for table "cms_pic".
 */
class Pic extends CActiveRecord
{
	/**
	 * The followings are the available columns in table 'cms_pic':
	 * @var integer $pic_id
	 * @var string $pic_path
	 * @var string $pic_desc
	 * @var string $pic_name
	 */

	/**
	 * Returns the static model of the specified AR class.
	 * @return Pic the static model class
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
		return 'cms_pic';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pic_path, pic_desc, pic_name', 'required'),
			array('pic_desc, pic_name', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('pic_id, pic_path, pic_desc, pic_name', 'safe', 'on'=>'search'),
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
			'pic_id' => Yii::t('project','Pic'),
			'pic_path' => Yii::t('project','Pic Path'),
			'pic_desc' => Yii::t('project','Pic Desc'),
			'pic_name' => Yii::t('project','Pic Name'),
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

		$criteria->compare('pic_id',$this->pic_id);

		$criteria->compare('pic_path',$this->pic_path,true);

		$criteria->compare('pic_desc',$this->pic_desc,true);

		$criteria->compare('pic_name',$this->pic_name,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
        
        protected function afterSave() {
            parent::afterSave();
            $log=new Logs;
            $log->user_name=Yii::app()->user->name;
            $log->add_time=time();
            if($this->isNewRecord)
               $log->actions=Yii::t('project','Create Pic').' #'.$this->pic_desc;
            else
               $log->actions=Yii::t('project','Update Pic').' #'.$this->pic_desc;
            $log->save();
        }
}
