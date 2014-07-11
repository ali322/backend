<?php

/**
 * This is the model class for table "ol_goods_cate_attr".
 *
 * The followings are the available columns in table 'ol_goods_cate_attr':
 * @property string $id
 * @property integer $cat_id
 * @property string $attr_name
 */
class GoodsCateAttr extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return GoodsCateAttr the static model class
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
		return 'ol_goods_cate_attr';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cat_id', 'required'),
			array('cat_id', 'numerical', 'integerOnly'=>true),
			array('attr_name', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, cat_id, attr_name', 'safe', 'on'=>'search'),
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
			'cat_id' => Yii::t('project','Cat'),
			'attr_name' => Yii::t('project','Attr Name'),
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
		$criteria->compare('cat_id',$this->cat_id);
		$criteria->compare('attr_name',$this->attr_name,true);

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
               $log->actions=Yii::t('webshop','Create GoodsCateAttr').' #'.$this->id;
            else
               $log->actions=Yii::t('webshop','Update GoodsCateAttr').' #'.$this->id;
            $log->save();
        }
}
