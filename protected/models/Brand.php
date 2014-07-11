<?php

/**
 * This is the model class for table "ol_brand".
 *
 * The followings are the available columns in table 'ol_brand':
 * @property string $brand_id
 * @property integer $cat_id
 * @property string $brand_alia
 * @property string $brand_name
 * @property string $brand_logo
 * @property string $brand_location
 * @property string $brand_desc
 * @property integer $add_time
 */
class Brand extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Brand the static model class
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
		return 'ol_brand';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cat_id, add_time,in_shop', 'numerical', 'integerOnly'=>true),
			array('brand_alia, brand_name, brand_logo, brand_location', 'length', 'max'=>90),
			array('brand_desc', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('brand_id, cat_id, brand_alia, brand_name, brand_logo, brand_location, brand_desc, add_time', 'safe', 'on'=>'search'),
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
			'topics'=>array(self::HAS_MANY,'Topic','brand_id'),
			'cate'=>array(self::BELONGS_TO,'Cate','cat_id'),
                     //   'goodsCate'=>array(self::BELONGS_TO,'GoodsCate','goods_cat_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'brand_id' => Yii::t('project','Brand'),
			'cat_id' => Yii::t('project','Cat'),
                        'in_shop' => Yii::t('project','In Shop'),
			'brand_alia' => Yii::t('project','Brand Alia'),
			'brand_name' => Yii::t('project','Brand Name'),
			'brand_logo' => Yii::t('project','Brand Logo'),
			'brand_location' => Yii::t('project','Brand Location'),
			'brand_desc' => Yii::t('project','Brand Desc'),
			'add_time' => Yii::t('project','Add Time'),
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

		$criteria->compare('brand_id',$this->brand_id,true);
		$criteria->compare('cat_id',$this->cat_id);
                $criteria->compare('in_shop',$this->in_shop);
		$criteria->compare('brand_alia',$this->brand_alia,true);
		$criteria->compare('brand_name',$this->brand_name,true);
		$criteria->compare('brand_logo',$this->brand_logo,true);
		$criteria->compare('brand_location',$this->brand_location,true);
		$criteria->compare('brand_desc',$this->brand_desc,true);
		$criteria->compare('add_time',$this->add_time);

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
               $log->actions=Yii::t('project','Create Brand').' #'.$this->brand_name;
            else
               $log->actions=Yii::t('project','Update Brand').' #'.$this->brand_name;
            $log->save();
        }
}
