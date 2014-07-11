<?php

/**
 * This is the model class for table "ol_order".
 *
 * The followings are the available columns in table 'ol_order':
 * @property string $id
 * @property string $order_sn
 * @property string $good_info
 * @property string $money_paid
 * @property string $order_amount
 * @property string $good_amount
 * @property integer $operator_id
 * @property integer $user_id
 * @property integer $order_status
 * @property integer $pay_status
 * @property string $consignee_info
 * @property string $ship_name
 * @property string $ship_fee
 * @property string $bonus_fee
 * @property string $pay_name
 * @property integer $add_time
 * @property integer $confirm_time
 * @property integer $pay_time
 * @property integer $shipping_time
 * @property integer $finish_time
 */
class Order extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Order the static model class
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
		return 'ol_order';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('order_sn, good_info, order_amount, good_amount, user_id, consignee_info, ship_fee', 'required'),
			array('operator_id, user_id, order_status, pay_status, confirm_time, pay_time, shipping_time, finish_time', 'numerical', 'integerOnly'=>true),
			array('order_sn, pay_name', 'length', 'max'=>20),
			array('money_paid, order_amount, good_amount, ship_fee, bonus_fee', 'length', 'max'=>10),
			array('ship_name', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, order_sn, good_info, money_paid, order_amount, good_amount, operator_id, user_id, order_status, pay_status, consignee_info, ship_name, ship_fee, bonus_fee, pay_name, add_time, confirm_time, pay_time, shipping_time, finish_time', 'safe', 'on'=>'search'),
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
                    'user'=>array(self::BELONGS_TO,'ShopUser','user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'order_sn' =>  Yii::t('webshop','Order Sn'),
			'good_info' =>  Yii::t('webshop','Good Info'),
			'money_paid' =>  Yii::t('webshop','Money Paid'),
			'order_amount' => Yii::t('webshop','Order Amount'),
			'good_amount' => Yii::t('webshop','Good Amount'),
			'operator_id' => Yii::t('webshop','Operator'),
			'user_id' => Yii::t('project','User'),
			'order_status' => Yii::t('webshop','Order Status'),
			'pay_status' => Yii::t('webshop','Pay Status'),
			'consignee_info' => Yii::t('webshop','Consignee Info'),
			'ship_name' => Yii::t('webshop','Ship Name'),
			'ship_fee' => Yii::t('webshop','Ship Fee'),
			'bonus_fee' => Yii::t('webshop','Bonus Fee'),
			'pay_name' => Yii::t('webshop','Pay Name'),
			'add_time' => Yii::t('webshop','Add Time'),
			'confirm_time' => Yii::t('webshop','Confirm Time'),
			'pay_time' => Yii::t('webshop','Pay Time'),
			'shipping_time' => Yii::t('webshop','Shipping Time'),
			'finish_time' => Yii::t('webshop','Finish Time'),
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
		$criteria->compare('order_sn',$this->order_sn,true);
		$criteria->compare('good_info',$this->good_info,true);
		$criteria->compare('money_paid',$this->money_paid,true);
		$criteria->compare('order_amount',$this->order_amount,true);
		$criteria->compare('good_amount',$this->good_amount,true);
		$criteria->compare('operator_id',$this->operator_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('order_status',$this->order_status);
		$criteria->compare('pay_status',$this->pay_status);
		$criteria->compare('consignee_info',$this->consignee_info,true);
		$criteria->compare('ship_name',$this->ship_name,true);
		$criteria->compare('ship_fee',$this->ship_fee,true);
		$criteria->compare('bonus_fee',$this->bonus_fee,true);
		$criteria->compare('pay_name',$this->pay_name,true);
		$criteria->compare('add_time',$this->add_time);
		$criteria->compare('confirm_time',$this->confirm_time);
		$criteria->compare('pay_time',$this->pay_time);
		$criteria->compare('shipping_time',$this->shipping_time);
		$criteria->compare('finish_time',$this->finish_time);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
        
        protected function beforeSave(){
		if(parent::beforeSave()){
			$this->add_time=time();
			return true;
		}else{
			return false;
		}
	}
        
        protected function afterSave() {
            parent::afterSave();
            $log=new Logs;
            $log->user_name=Yii::app()->user->name;
            $log->add_time=time();
            if($this->isNewRecord)
               $log->actions=Yii::t('webshop','Create Order').' #'.$this->order_sn;
            else
               $log->actions=Yii::t('webshop','Update Order').' #'.$this->order_sn;
            $log->save();
        }
        
        protected function afterFind() {
            parent::afterFind();
            $this->add_time=date('Y-m-d H:i:s',$this->add_time);
        }
}