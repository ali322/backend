<?php

/**
 * This is the model class for table "ol_goods".
 *
 * The followings are the available columns in table 'ol_goods':
 * @property string $good_id
 * @property integer $brand_id
 * @property integer $cat_id
 * @property string $good_name
 * @property string $good_sn
 * @property string $good_number
 * @property string $market_price
 * @property string $shop_price
 * @property string $discount
 * @property integer $add_time
 * @property integer $sold_count
 * @property integer $is_on_sale
 * @property integer $is_recommend
 * @property string $promote_price
 * @property integer $promote_start_time
 * @property integer $promote_end_time
 */
class Goods extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Goods the static model class
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
		return 'ol_goods';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('brand_id, cat_id', 'required'),
			array('brand_id, cat_id, add_time, sold_count, promote_start_time, promote_end_time,is_on_sale,is_recommend', 'numerical', 'integerOnly'=>true),
			array('good_name', 'length', 'max'=>120),
			array('good_sn', 'length', 'max'=>60),
                        array('good_number', 'length', 'max'=>255),
			array('market_price, shop_price,discount, promote_price', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('good_id, brand_id, cat_id, good_name, good_sn,good_number, market_price, shop_price,discount, add_time, sold_count, promote_price, promote_start_time, promote_end_time', 'safe', 'on'=>'search'),
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
		'good_detail'=>array(self::HAS_ONE,'GoodsDetail','good_id'),
                 'cate'=>array(self::BELONGS_TO,'GoodsCate','cat_id'),
                 'brand'=>array(self::BELONGS_TO,'Brand','brand_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'good_id' => Yii::t('project','Good'),
			'brand_id' => Yii::t('project','Brand'),
			'cat_id' => Yii::t('project','Cat'),
			'good_name' => Yii::t('project','Good Name'),
			'good_sn' => Yii::t('project','Good Sn'),
                        'good_number' => Yii::t('project','Good Number'),
			'market_price' => Yii::t('project','Market Price'),
			'shop_price' => Yii::t('project','Shop Price'),
			'add_time' => Yii::t('project','Add Time'),
			'sold_count' => Yii::t('project','Sold Count'),
                        'is_on_sale' => Yii::t('project','On Sale'),
                        'is_recommend'=> Yii::t('project','Recommend'),
			'promote_price' => Yii::t('project','Promote Price'),
			'promote_start_time' => Yii::t('project','Promote Start Time'),
			'promote_end_time' => Yii::t('project','Promote End Time'),
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

		$criteria->compare('good_id',$this->good_id,true);
		$criteria->compare('brand_id',$this->brand_id);
		$criteria->compare('cat_id',$this->cat_id);
		$criteria->compare('good_name',$this->good_name,true);
		$criteria->compare('good_sn',$this->good_sn,true);
                $criteria->compare('good_sn',$this->good_number,true);
		$criteria->compare('market_price',$this->market_price,true);
		$criteria->compare('shop_price',$this->shop_price,true);
                $criteria->compare('discount',$this->discount,true);
		$criteria->compare('add_time',$this->add_time);
		$criteria->compare('sold_count',$this->sold_count);
                $criteria->compare('is_on_sale',$this->is_on_sale);
                $criteria->compare('is_recommend',$this->is_recommend);
		$criteria->compare('promote_price',$this->promote_price,true);
		$criteria->compare('promote_start_time',$this->promote_start_time);
		$criteria->compare('promote_end_time',$this->promote_end_time);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	/*
	protected function  beforeSave(){
		if(parent::beforeSave()){
			$this->add_time=time();
			return true;
		}else{
			return false;
		}
	}
         * */
        protected function afterSave() {
            parent::afterSave();
            $log=new Logs;
            $log->user_name=Yii::app()->user->name;
            $log->add_time=time();
            if($this->isNewRecord)
               $log->actions=Yii::t('webshop','Create Goods').' #'.$this->good_name;
            else
               $log->actions=Yii::t('webshop','Update Goods').' #'.$this->good_name;
            $log->save();
        }
        
        protected function beforeSave() {
            if(parent::beforeSave()){
                $this->discount=round(($this->shop_price/$this->market_price)*10,0);
                return true;
            }else{
                return false;
            }
        }
}
