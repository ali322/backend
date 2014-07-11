<?php

/**
 * This is the model class for table "ol_goods_cate".
 *
 * The followings are the available columns in table 'ol_goods_cate':
 * @property string $cat_id
 * @property string $cat_name
 * @property string $cat_desc
 * @property integer $sort_order
 * @property integer $parent_id
 * @property integer $Lft
 * @property integer $Rgt
 */
class GoodsCate extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return GoodsCate the static model class
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
		return 'ol_goods_cate';
	}
	
	public function behaviors(){
		return array(
			'array_sort'=>array(
				'class'=>'ext.behaviors.array_sort',
				'db'=>$this->getDbConnection(),
				'table'=>'ol_goods_cate',
				'cat_id'=>'cat_id',
				'cat_name'=>'cat_name',
			),
		);
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('sort_order, parent_id, lft, rgt, level', 'numerical', 'integerOnly'=>true),
			array('cat_name', 'length', 'max'=>90),
			array('cat_desc', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('cat_id, cat_name, cat_desc, sort_order, parent_id, lft, rgt, level', 'safe', 'on'=>'search'),
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
			'goods'=>array(self::HAS_MANY,'Goods','cat_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'cat_id' => Yii::t('WebshopModule.webshop','Cat'),
			'cat_name' => Yii::t('WebshopModule.webshop','Cat Name'),
			'cat_desc' => Yii::t('WebshopModule.webshop','Cat Desc'),
			'sort_order' => Yii::t('WebshopModule.webshop','Sort Order'),
			'parent_id' => Yii::t('WebshopModule.webshop','Parent'),
			'lft' => 'Lft',
			'rgt' => 'Rgt',
			'level'=>Yii::t('WebshopModule.webshop','Level'),
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
		$criteria->compare('cat_desc',$this->cat_desc,true);
		$criteria->compare('sort_order',$this->sort_order);
		$criteria->compare('parent_id',$this->parent_id);
		$criteria->compare('lft',$this->lft);
		$criteria->compare('rgt',$this->rgt);
		$criteria->compare('level',$this->level);

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
               $log->actions=Yii::t('webshop','Create GoodsCate').' #'.$this->cat_name;
            else
               $log->actions=Yii::t('webshop','Update GoodsCate').' #'.$this->cat_name;
            $log->save();
        }
}