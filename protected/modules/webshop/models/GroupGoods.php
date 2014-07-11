<?php

/**
 * This is the model class for table "ol_group_goods".
 *
 * The followings are the available columns in table 'ol_group_goods':
 * @property string $id
 * @property integer $main_id
 * @property string $ext_condition
 */
class GroupGoods extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return GroupGoods the static model class
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
		return 'ol_group_goods';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('main_id', 'required'),
			array('main_id', 'numerical', 'integerOnly'=>true),
			array('ext_condition', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, main_id, ext_condition', 'safe', 'on'=>'search'),
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
			'id' => Yii::t('project','ID'),
			'main_id' => Yii::t('project','Main'),
			'ext_condition' => Yii::t('project','Ext Condition'),
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
		$criteria->compare('main_id',$this->main_id);
		$criteria->compare('ext_condition',$this->ext_condition,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}
