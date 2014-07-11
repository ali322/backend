<?php

class GoodsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	//public $layout='//layouts/column2';
        public function actions(){
             return array(
               'upload'=>'ext.EAjaxUpload.EAjaxUploadAction',
               'loadData'=>array(
                   'class'=>'ext.easyui.actions.LoadData',
                   'modelName'=>'Goods',
                   'sortColumn'=>array('t.add_time','desc'),
                   'selects'=>array('good_id','good_name','cat_id','brand_id','shop_price','market_price','is_on_sale','is_recommend'),
                   'relationColumns'=>array(
                       'cat_id'=>array('cate','cat_name'),
                       'brand_id'=>array('brand','brand_name'),
                   ),
                   'lookupColumns'=>array('is_on_sale','is_recommend'),
               ),
                
                'updateBatch'=>array(
                   'class'=>'ext.easyui.actions.UpdateBatch',
                   'modelName'=>'Goods',
                    'idField'=>'good_id',
                )
            );
        }
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'rights', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','viewattr','loaddata','upload'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','admin','loaddata','updateBatch'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
	
	public function actionViewAttr(){
		$cat_id=(int)$_POST['Goods']['cat_id'];
		$good_id=(int)$_POST['good_id'];
	//	$cat_id=13;
		$criteria=new CDbCriteria;
		$criteria->condition='cat_id =:cat_id';
		$criteria->params=array(':cat_id'=>$cat_id);
		$data=GoodsCateAttr::model()->findAll($criteria);

		if($good_id !=''){
		$criteria=new CDbCriteria;
		$criteria->condition='good_id =:good_id';
		$criteria->params=array(':good_id'=>$good_id);
		$good_attrs=GoodsAttr::model()->findAll($criteria);
		
		$good_attrs_list=array();
		foreach ($good_attrs as $row)
			$good_attrs_list[$row->attr_name]=$row->attr_value;
		}
		$data=CHtml::listData($data,'attr_name','attr_name');


    	foreach($data as $value=>$name)
    	{
       		 echo '<div class="row">'.CHtml::label($name,"good_attrs[".$name."]").CHtml::textfield("good_attrs[".$name."]",isset($good_attrs_list[$name])?$good_attrs_list[$name]:'').'</div>';    		 
    	}		
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{   
               // mkdir('../upload/webshop/good_img/'.date('Ymd',time()));
		$model=new Goods;

		$model_=new GoodsDetail;
		
	//	$good_attrs=new GoodsAttr;
		
	//	$criteria=new CDbCriteria;
	//	$criteria->order='brand_id desc';
        //        $criteria->condition='in_shop =1';
	//	$brands=Brand::model()->findAll($criteria);
		
	//	$criteria=new CDbCriteria;
	//	$criteria->order='cat_id desc';
	//	$cates=GoodsCate::model()->findAll($criteria);
	//	$cates=GoodsCate::model()->get_dynamic_cate(0);
	//	unset($cates[0]);
	//	CVarDumper::dump($cates);exit;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Goods']) && isset($_POST['GoodsDetail']))
		{
			$model->attributes=$_POST['Goods'];
                        $model->add_time=time();
			if($model->save()){
				if(isset($_POST['good_attrs'])){
					foreach($_POST['good_attrs'] as $k=>$v){
				//		$good_attr=GoodsAttr::model()->find('good_id ='.(int)$id.' and attr_name ="'.$k.'"');
						$good_attr=new GoodsAttr;
						$good_attr->attr_value=$v;
						$good_attr->attr_name=$k;
						$good_attr->good_id=(int)$model->good_id;
						$good_attr->save();
					}
				}
				$model_->attributes=$_POST['GoodsDetail'];
			//	CVarDumper::dump($_POST['GoodsDetail']);exit;
				$model_->good_id=$model->good_id;
				if($model_->save()){
					if(isset($_FILES) && !empty($_FILES['pic_src']['tmp_name'])){
					$file=CUploadedFile::getInstanceByName('pic_src');
                                        $target_dir=is_dir('../upload/webshop/good_img/'.date('Ymd',time()))?'../upload/webshop/good_img/'.date('Ymd',time()):mkdir('../upload/webshop/good_img/'.date('Ymd',time()));
			//		$brand_id=$model_->getDbConnection()->getLastInsertID();
                                        $target_file='/upload/webshop/good_img/'.date('Ymd',time()).'/'.$model_->good_id.'.'.$file->getExtensionName();
                                        $file->saveAs(Yii::app()->params['img_url'].$target_file);
                            //              CVarDumper::dump($target_file);exit;
                                        $thumb_file=ImageHelper::thumb(120,120,$target_file,array('method' => 'adaptiveResize'));
					$model_->updateByPk($model_->id,array('good_img'=>$target_file,'good_thumb'=>$thumb_file));
					}
                                        echo $this->renderPartial('view',array('model'=>$this->loadModel($model->good_id)),true);Yii::app()->end();
				//	echo $this->render('view',array('id'=>$model->good_id),true);
				}
				
			}
		}

		$this->render('create',array(
	//		'good_attrs'=>$good_attrs,
			'model'=>$model,
			'model_'=>$model_,
		//	'cates'=>$cates,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		$model_=GoodsDetail::model()->find("good_id = :good_id",array(':good_id'=>$model->good_id));
	//	CVarDumper::dump($model_);exit;
		
	//	$criteria=new CDbCriteria;
	//	$criteria->order='brand_id desc';
         //       $criteria->condition='in_shop =1';
	//	$brands=Brand::model()->findAll($criteria);
		
	//	$criteria=new CDbCriteria;
	//	$criteria->order='cat_id desc';
	//	$cates=GoodsCate::model()->findAll($criteria);
	//	$cates=GoodsCate::model()->get_dynamic_cate(0);
	//	unset($cates[0]);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$criteria=new CDbCriteria;
		$criteria->condition='good_id =:good_id';
		$criteria->params=array(':good_id'=>(int)$id);
		$good_attrs=GoodsAttr::model()->findAll($criteria);
		
		$good_attrs_list=array();
		if($good_attrs){
			foreach ($good_attrs as $row)
				$good_attrs_list[$row->attr_name]=$row->attr_value;
		}

		if(isset($_POST['Goods']))
		{
			$model->attributes=$_POST['Goods'];
               //         $model->is_on_sale=$_POST['Goods']['is_on_sale'];
                  //      CVarDumper::dump($model->attributes);exit;
			if($model->save()){
				$model_->attributes=$_POST['GoodsDetail'];
				$model_->good_id=$model->good_id;
				if(isset($_FILES) && !empty($_FILES['pic_src']['tmp_name'])){
				$file=CUploadedFile::getInstanceByName('pic_src');
				$target_file='/upload/webshop/good_img/'.$model_->good_id.'.'.$file->getExtensionName();
                     //           $target_file_='/upload/webshop/good_img/'.$model_->good_id.'.'.$file->getExtensionName();
				$model_->good_img=$target_file;
				}
				if(isset($_POST['good_attrs'])){
					foreach($_POST['good_attrs'] as $k=>$v){
						$good_attr=GoodsAttr::model()->find('good_id ='.(int)$id.' and attr_name ="'.$k.'"');
						if(!$good_attr)$good_attr=new GoodsAttr;
						$good_attr->attr_value=$v;
						$good_attr->attr_name=$k;
						$good_attr->good_id=(int)$id;
						$good_attr->save();
					}
				}
				if($model_->save()){
					if(isset($_FILES) && !empty($_FILES['pic_src']['tmp_name']))
						$file->saveAs(Yii::app()->params['img_url'].$target_file);
				}
                                exit($this->renderPartial('view',array('model'=>$this->loadModel($model->good_id)),true));
				//echo $this->render('view',array('id'=>$model->good_id),true);
			}			
		}

	//	CVarDumper::dump($good_attrs);
		$this->render('update',array(
			'good_attrs_list'=>isset($good_attrs_list)?$good_attrs_list:'',
			'model'=>$model,
			'model_'=>$model_,
		//	'cates'=>$cates,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isAjaxRequest)
		{
                    foreach(explode(',',$id) as $v)
			// we only allow deletion via POST request
			echo $this->loadModel($v)->delete();
			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		//	if(!isset($_GET['ajax']))
			//	$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
      //      $this->layout='//layouts/column1';
	//	if (Yii::app()->request->isAjaxRequest) {

   		//	exit;
	//	}
	//	$model=new Goods;
	//	$dataProvider=new CActiveDataProvider('Goods');
		$this->render('index',array(
		//	'dataProvider'=>$dataProvider,
		//	'model'=>$model,
		));
	}

	
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Goods('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Goods']))
			$model->attributes=$_GET['Goods'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

        
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Goods::model()->findByPk((int)$id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='goods-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
