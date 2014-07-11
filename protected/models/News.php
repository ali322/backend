<?php

/**
 * This is the model class for table "ol_news".
 *
 * The followings are the available columns in table 'ol_news':
 * @property string $news_id
 * @property string $news_title
 * @property string $news_ad
 * @property integer $add_time
 * @property string $news_content
 * @property integer $cat_id
 */
class News extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return News the static model class
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
		return 'ol_news';
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
			array('add_time, cat_id', 'numerical', 'integerOnly'=>true),
			array('news_title, news_ad', 'length', 'max'=>90),
			array('news_content', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('news_id, news_title, news_ad, add_time, news_content, cat_id', 'safe', 'on'=>'search'),
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
			'cate'=>array(self::BELONGS_TO,'NewsCate','cat_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'news_id' => Yii::t('project','News'),
			'news_title' => Yii::t('project','News Title'),
			'news_ad' => Yii::t('project','News Ad'),
			'add_time' => Yii::t('project','Add Time'),
			'news_content' => Yii::t('project','News Content'),
			'cat_id' => Yii::t('project','Cat'),
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

		$criteria->compare('news_id',$this->news_id,true);
		$criteria->compare('news_title',$this->news_title,true);
		$criteria->compare('news_ad',$this->news_ad,true);
		$criteria->compare('add_time',$this->add_time);
		$criteria->compare('news_content',$this->news_content,true);
		$criteria->compare('cat_id',$this->cat_id);

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
               $log->actions=Yii::t('project','Create News').' #'.$this->news_title;
            else
               $log->actions=Yii::t('project','Update News').' #'.$this->news_title;
            $log->save();
        }
}
