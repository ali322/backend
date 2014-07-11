<?php

/**
 * This is the model class for table "ol_topic".
 *
 * The followings are the available columns in table 'ol_topic':
 * @property string $topic_id
 * @property string $topic_name
 * @property integer $brand_id
 * @property string $discount
 * @property string $topic_content
 * @property integer $begin_time
 * @property integer $end_time
 * @property integer $add_time
 */
class Topic extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Topic the static model class
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
		return 'ol_topic';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('brand_id, sort_order', 'numerical', 'integerOnly'=>true),
			array('topic_name, discount,topic_ad', 'length', 'max'=>90),
			array('topic_content', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('topic_id, topic_name, brand_id, topic_ad,discount, topic_content, begin_time, end_time, add_time,sort_order', 'safe', 'on'=>'search'),
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
		'brand'=>array(self::BELONGS_TO,'Brand','brand_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'topic_id' => Yii::t('project','Topic'),
			'topic_name' => Yii::t('project','Topic Name'),
			'topic_ad' => Yii::t('project','Topic Ad'),
			'brand_id' => Yii::t('project','Brand'),
			'discount' => Yii::t('project','Discount'),
			'topic_content' => Yii::t('project','Topic Content'),
			'begin_time' => Yii::t('project','Begin Time'),
			'end_time' => Yii::t('project','End Time'),
			'add_time' => Yii::t('project','Add Time'),
			'sort_order'=>Yii::t('project', 'Sort Order'),
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

		$criteria->compare('topic_id',$this->topic_id,true);
		$criteria->compare('topic_name',$this->topic_name,true);
		$criteria->compare('brand_id',$this->brand_id);
		$criteria->compare('sort_order',$this->sort_order);
		$criteria->compare('discount',$this->discount,true);
	//	$criteria->compare('topic_content',$this->topic_content,true);
		$criteria->compare('topic_ad',$this->topic_ad,true);
		$criteria->compare('begin_time',$this->begin_time);
		$criteria->compare('end_time',$this->end_time);
		$criteria->compare('add_time',$this->add_time);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
	protected function afterFind(){
		parent::afterFind();
		$this->add_time=date('Y-m-d H:i:s',$this->add_time);
                $this->begin_time=date('Y-m-d H:i:s',$this->begin_time);
                $this->end_time=date('Y-m-d H:i:s',$this->end_time);
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
               $log->actions=Yii::t('project','Create Topic').' #'.$this->topic_name;
            else
               $log->actions=Yii::t('project','Update Topic').' #'.$this->topic_name;
            $log->save();
        }
}
