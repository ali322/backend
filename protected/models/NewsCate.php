<?php

/**
 * This is the model class for table "ol_news_cate".
 *
 * The followings are the available columns in table 'ol_news_cate':
 * @property string $cat_id
 * @property string $cat_name
 * @property string $cat_alia
 * @property integer $sort_order
 */
class NewsCate extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return NewsCate the static model class
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
		return 'ol_news_cate';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sort_order', 'numerical', 'integerOnly'=>true),
			array('cat_name, cat_alia', 'length', 'max'=>90),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cat_id, cat_name, cat_alia, sort_order', 'safe', 'on'=>'search'),
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
			'news'=>array(self::HAS_MANY,'News','cat_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'cat_id' => Yii::t('project','Cat'),
			'cat_name' => Yii::t('project','Cat Name'),
			'cat_alia' => Yii::t('project','Cat Alia'),
			'sort_order' => Yii::t('project','Sort Order'),
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

		$criteria->compare('cat_id',$this->cat_id,true);
		$criteria->compare('cat_name',$this->cat_name,true);
		$criteria->compare('cat_alia',$this->cat_alia,true);
		$criteria->compare('sort_order',$this->sort_order);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}
