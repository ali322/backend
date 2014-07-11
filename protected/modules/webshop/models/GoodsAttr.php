<?php

/**
 * This is the model class for table "ol_goods_attr".
 *
 * The followings are the available columns in table 'ol_goods_attr':
 * @property string $id
 * @property integer $good_id
 * @property integer $attr_id
 * @property string $attr_name
 * @property string $attr_value
 */
class GoodsAttr extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return GoodsAttr the static model class
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
		return 'ol_goods_attr';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('good_id', 'required'),
			array('good_id', 'numerical', 'integerOnly'=>true),
			array('attr_name', 'length', 'max'=>50),
			array('attr_value', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, good_id, attr_name, attr_value', 'safe', 'on'=>'search'),
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
			'good_id' => Yii::t('project','Good'),
		//	'attr_id' => Yii::t('project','Attr'),
			'attr_name' => Yii::t('project','Attr Name'),
			'attr_value' => Yii::t('project','Attr Value'),
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
		$criteria->compare('good_id',$this->good_id);
	//	$criteria->compare('attr_id',$this->attr_id);
		$criteria->compare('attr_name',$this->attr_name,true);
		$criteria->compare('attr_value',$this->attr_value,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}
