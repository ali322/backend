<?php

/**
 * This is the model class for table "sys_logs".
 *
 * The followings are the available columns in table 'sys_logs':
 * @property integer $id
 * @property string $user_name
 * @property string $actions
 * @property integer $add_time
 */
class Logs extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Logs the static model class
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
		return 'sys_logs';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_name, add_time', 'required'),
			array('add_time', 'numerical', 'integerOnly'=>true),
			array('user_name', 'length', 'max'=>100),
			array('actions', 'length', 'max'=>250),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_name, actions, add_time', 'safe', 'on'=>'search'),
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
			'id'=>'ID',
			'user_name'=>Yii::t('project','User Name'),
			'actions'=> Yii::t('project','Actions'),
			'add_time'=> Yii::t('project','Operate Time'),
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
		$criteria->compare('user_name',$this->user_name,true);
		$criteria->compare('actions',$this->actions,true);
		$criteria->compare('add_time',$this->add_time);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
        
        protected function afterFind() {
            parent::afterFind();
	    $this->add_time=date('Y-m-d H:i:s',$this->add_time);
        }
}