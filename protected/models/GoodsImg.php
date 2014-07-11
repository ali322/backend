<?php

/**
 * This is the model class for table "ol_goods_img".
 *
 * The followings are the available columns in table 'ol_goods_img':
 * @property string $img_id
 * @property string $img_url
 * @property string $good_id
 * @property string $color_code
 */
class GoodsImg extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return GoodsImg the static model class
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
		return 'ol_goods_img';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('img_url', 'required'),
			array('img_url', 'length', 'max'=>100),
			array('good_id', 'length', 'max'=>10),
			array('color_code', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('img_id, img_url, good_id, color_code', 'safe', 'on'=>'search'),
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
			'img_id' => 'Img',
			'img_url' => 'Img Url',
			'good_id' => 'Good',
			'color_code' => 'Color Code',
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

		$criteria->compare('img_id',$this->img_id,true);
		$criteria->compare('img_url',$this->img_url,true);
		$criteria->compare('good_id',$this->good_id,true);
		$criteria->compare('color_code',$this->color_code,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}