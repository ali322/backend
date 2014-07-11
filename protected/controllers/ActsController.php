<?php

class ActsController extends RController
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
//	public $layout='//layouts/column2';

        public function actions(){
           return array(
               'upload'=>array(
                   'class'=>'ext.EAjaxUpload.EAjaxUploadAction',
                   'category'=>'outlets/act_ad',
                //   'thumbed'=>false
               ),
               'loadData'=>array(
                   'class'=>'ext.easyui.actions.LoadData',
                   'modelName'=>'Acts',
                   'sortColumn'=>array('t.add_time','desc'),
                   'selects'=>array('act_id','act_name','begin_time','end_time'),
                   'relationColumns'=>array(
                 //      'brand_id'=>array('brand','brand_name'),
                   //    'brand_id'=>array('brand','brand_name'),
                   ),
                   'lookupColumns'=>array(
                  //     'in_shop'
                    //   'is_on_sale','is_recommend'
                       ),
               ),
                
                'updateBatch'=>array(
                   'class'=>'ext.easyui.actions.UpdateBatch',
                   'modelName'=>'Acts',
                    'idField'=>'act_id',
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
			//	'actions'=>array('index','view'),
			//	'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','loadData','updateBatch','index','view'),
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
         //   Yii::app()->request->
	//	strip_tags()
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Acts;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Acts']))
		{
			$model->attributes=$_POST['Acts'];
                        $model->begin_time=isset($_POST['Acts']['begin_time'])?strtotime($_POST['Acts']['begin_time']):'';
			$model->end_time=isset($_POST['Acts']['end_time'])?strtotime($_POST['Acts']['end_time']):'';
			if($model->save()){
                                if(isset($_FILES) && !empty($_FILES['pic_src']['tmp_name'])){
					$file=CUploadedFile::getInstanceByName('pic_src');
					$act_id=$model->getDbConnection()->getLastInsertID();
					$target_file='../upload/outlets/act_ad/'.$act_id.'.'.$file->getExtensionName();
					$model->updateByPk($act_id,array('act_ad'=>$target_file));
					$file->saveAs($target_file);
				}
				$this->redirect(array('view','id'=>$model->act_id));
                        }
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
	//	mysql	
		//Yii::app()->
	//	sub
	//	mysql_connect
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Acts']))
		{
			$model->attributes=$_POST['Acts'];
                        $model->begin_time=isset($_POST['Acts']['begin_time'])?strtotime($_POST['Acts']['begin_time']):'';
			$model->end_time=isset($_POST['Acts']['end_time'])?strtotime($_POST['Acts']['end_time']):'';
                        if(isset($_FILES) && !empty($_FILES['pic_src']['tmp_name'])){
				$file=CUploadedFile::getInstanceByName('pic_src');
				$target_file='../upload/outlets/act_ad/'.$model->act_id.'.'.$file->getExtensionName();
				$model->act_ad=$target_file;
			}
			if($model->save()){
                                if(isset($_FILES) && !empty($_FILES['pic_src']['tmp_name']))
					$file->saveAs($target_file);
				$this->redirect(array('view','id'=>$model->act_id));
                        }
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isAjaxRequest)
		{
                        foreach(explode(',',$id) as $v)
                            echo $this->loadModel($v)->delete();
			// we only allow deletion via POST request
			//echo	$this->loadModel($id)->delete();

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
        //    $this->layout='//layouts/column1';
	//	$dataProvider=new CActiveDataProvider('Acts');
		$this->render('index',array(
		//	'dataProvider'=>$dataProvider,
		));
	}
	

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Acts('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Acts']))
			$model->attributes=$_GET['Acts'];

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
		$model=Acts::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='acts-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
