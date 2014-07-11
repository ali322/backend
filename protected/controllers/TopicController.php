<?php

class TopicController extends Controller
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
                   'category'=>'outlets/topic_ad',
              //     'thumbed'=>false
               ),
               'loadData'=>array(
                   'class'=>'ext.easyui.actions.LoadData',
                   'modelName'=>'Topic',
                   'sortColumn'=>array('t.add_time','desc'),
                   'selects'=>array('topic_id','brand_id','topic_name','discount','begin_time','end_time','sort_order'),
                   'relationColumns'=>array(
                       'brand_id'=>array('brand','brand_name'),
                   //    'brand_id'=>array('brand','brand_name'),
                   ),
                   'lookupColumns'=>array(
                  //     'in_shop'
                    //   'is_on_sale','is_recommend'
                       ),
               ),
                
                'updateBatch'=>array(
                   'class'=>'ext.easyui.actions.UpdateBatch',
                   'modelName'=>'Topic',
                    'idField'=>'topic_id',
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
				'actions'=>array('create','update','admin','delete','index','view','loadData','updateBatch'),
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
		$model=new Topic;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Topic']))
		{
			$model->attributes=$_POST['Topic'];
			$model->begin_time=isset($_POST['Topic']['begin_time'])?strtotime($_POST['Topic']['begin_time']):'';
			$model->end_time=isset($_POST['Topic']['end_time'])?strtotime($_POST['Topic']['end_time']):'';			
			if($model->save()){
				if(isset($_FILES) && !empty($_FILES['pic_src']['tmp_name'])){
					$file=CUploadedFile::getInstanceByName('pic_src');
					$topic_id=$model->getDbConnection()->getLastInsertID();
					$target_file='../upload/outlets/topic_ad/'.$topic_id.'.'.$file->getExtensionName();
					$model->updateByPk($topic_id,array('topic_ad'=>$target_file));
					$file->saveAs($target_file);
					}

				$this->redirect(array('view','id'=>$model->topic_id));
			}
		}

		//		品牌选择
		$criteria=new CDbCriteria;
		$criteria->order='add_time desc';
	  	$brands=Brand::model()->findAll($criteria);
	  	
		$this->render('create',array(
			'model'=>$model,
			'brands'=>$brands,
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

		if(isset($_POST['Topic']))
		{
			$model->attributes=$_POST['Topic'];
			if(isset($_FILES) && !empty($_FILES['pic_src']['tmp_name'])){
				$file=CUploadedFile::getInstanceByName('pic_src');
				$target_file='../upload/outlets/topic_ad/'.$model->topic_id.'.'.$file->getExtensionName();
				$model->topic_ad=$target_file;
			//	var_dump($target_file);exit;
			}
			$model->begin_time=isset($_POST['Topic']['begin_time'])?strtotime($_POST['Topic']['begin_time']):'';
			$model->end_time=isset($_POST['Topic']['end_time'])?strtotime($_POST['Topic']['end_time']):'';
			//	echo 'ok';exit;
			if($model->save()){
				if(isset($_FILES) && !empty($_FILES['pic_src']['tmp_name']))
					$file->saveAs($target_file);
				$this->redirect(array('view','id'=>$model->topic_id));
			}
		}

//		品牌选择
		$criteria=new CDbCriteria;
		$criteria->order='add_time desc';
	  	$brands=Brand::model()->findAll($criteria);
	  	
		$this->render('update',array(
			'model'=>$model,
			'brands'=>$brands,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isAjaxRequest)
		{
                     foreach(explode(',',$id) as $v)
			// we only allow deletion via POST request
			echo $this->loadModel($v)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			//if(!isset($_GET['ajax']))
			//	$this->redirect(array('index'));
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
		//$dataProvider=new CActiveDataProvider('Topic');
		$this->render('index',array(
		//	'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Topic('search');
		if(isset($_GET['Topic']))
			$model->attributes=$_GET['Topic'];

	//	CVarDumper::dump(count($model->attributes).'33333');
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
				$this->_model=Topic::model()->findbyPk($_GET['id']);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='topic-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
