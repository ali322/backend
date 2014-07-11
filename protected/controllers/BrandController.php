<?php

class BrandController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to 'column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
//	public $layout='column2';
        public function actions(){
           return array(
               'upload'=>array(
                   'class'=>'ext.EAjaxUpload.EAjaxUploadAction',
                   'category'=>'outlets/brand_logo',
               //    'thumbed'=>false
               ),
               'loadData'=>array(
                   'class'=>'ext.easyui.actions.LoadData',
                   'modelName'=>'Brand',
                   'sortColumn'=>array('t.add_time','desc'),
                   'selects'=>array('brand_id','cat_id','brand_name','brand_alia','brand_location','in_shop'),
                   'relationColumns'=>array(
                       'cat_id'=>array('cate','cat_name'),
                   //    'brand_id'=>array('brand','brand_name'),
                   ),
                   'lookupColumns'=>array(
                       'in_shop'
                    //   'is_on_sale','is_recommend'
                       ),
               ),
                
                'updateBatch'=>array(
                   'class'=>'ext.easyui.actions.UpdateBatch',
                   'modelName'=>'Brand',
                    'idField'=>'brand_id',
                )
            );
        }
	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;

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
			//	'actions'=>array('index','view'),
			//	'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','delete','index','view','loadData','updateBatch'),
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

        public function actionRemoteData(){
            	$criteria=new CDbCriteria;
		$criteria->order='brand_name asc';
                $criteria->condition='in_shop =1';
		$brands=Brand::model()->findAll($criteria);
                
                $brands_=array();
                foreach($brands as $row)
                    $brands_[]=array('id'=>$row->brand_id,'text'=>$row->brand_name);
                exit(CJavaScript::jsonEncode($brands_));
        }
	/**
	 * Displays a particular model.
	 */
	public function actionView()
	{
		$this->render('view',array(
			'model'=>$this->loadModel(),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Brand;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Brand']))
		{
			$model->attributes=$_POST['Brand'];
	//		$model->brand_alia=$_POST['Brand']['brand_alia'];
                  //      $model->brand_logo=Yii::app()->params['img_url'].$model->brand_logo;
			if($model->save()){
				if(isset($_FILES) && !empty($_FILES['pic_src']['tmp_name'])){
					$file=CUploadedFile::getInstanceByName('pic_src');
					$brand_id=$model->getDbConnection()->getLastInsertID();
					$target_file='../upload/outlets/brand_logo/'.$brand_id.'.'.$file->getExtensionName();
					$model->updateByPk($brand_id,array('brand_logo'=>$target_file));
					$file->saveAs($target_file);
					}
				$this->redirect(array('view','id'=>$model->brand_id));
			}
		}
//		分类选择
		$criteria=new CDbCriteria;
		$criteria->order='cat_id desc';
	  	$cates=Cate::model()->findAll($criteria);
	  	
		$this->render('create',array(
			'model'=>$model,
			'cates'=>$cates,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpdate()
	{
		$model=$this->loadModel();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Brand']))
		{
			$model->attributes=$_POST['Brand'];
                   //     $model->brand_logo=Yii::app()->params['img_url'].$model->brand_logo;
		//	$model->brand_alia=$_POST['Brand']['brand_alia'];
		//	var_dump($model->attributes);exit;
			if(isset($_FILES) && !empty($_FILES['pic_src']['tmp_name'])){
				$file=CUploadedFile::getInstanceByName('pic_src');
				$target_file='../upload/outlets/brand_logo/'.$model->brand_id.'.'.$file->getExtensionName();
				$model->brand_logo=$target_file;
				}
			if($model->save()){
				if(isset($_FILES) && !empty($_FILES['pic_src']['tmp_name']))
					$file->saveAs($target_file);
				$this->redirect(array('view','id'=>$model->brand_id));
			}
		}

		//		分类选择
		$criteria=new CDbCriteria;
		$criteria->order='cat_id desc';
	  	$cates=Cate::model()->findAll($criteria);
	  	
		$this->render('update',array(
			'model'=>$model,
			'cates'=>$cates,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 */
	public function actionDelete()
	{
		if(Yii::app()->request->AjaxRequest)
		{
                        foreach(explode(',',$id) as $v)
                            echo $this->loadModel($v)->delete();
			// we only allow deletion via POST request
		//	$this->loadModel()->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		//	if(!isset($_GET['ajax']))
		//		$this->redirect(array('index'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
    //        $this->layout='//layouts/column1';
	//	$dataProvider=new CActiveDataProvider('Brand');
		$this->render('index',array(
		//	'dataProvider'=>$dataProvider,
		));
	}
        
        

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Brand('search');
		if(isset($_GET['Brand']))
			$model->attributes=$_GET['Brand'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 */
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
				$this->_model=Brand::model()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='brand-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
