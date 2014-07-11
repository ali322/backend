<?php

class NewsController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
//	public $layout='//layouts/column2';

        public function actions(){
           return array(
               'loadData'=>array(
                   'class'=>'ext.easyui.actions.LoadData',
                   'modelName'=>'News',
                   'sortColumn'=>array('t.add_time','desc'),
                   'selects'=>array('news_id','cat_id','news_title','add_time'),
                   'relationColumns'=>array(
                       'cat_id'=>array('cate','cat_name'),
                   //    'brand_id'=>array('brand','brand_name'),
                   ),
                   'lookupColumns'=>array(
                    //   'in_shop'
                    //   'is_on_sale','is_recommend'
                       ),
               ),
                
                'updateBatch'=>array(
                   'class'=>'ext.easyui.actions.UpdateBatch',
                   'modelName'=>'News',
                    'idField'=>'news_id',
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
				'actions'=>array('create','update','index','view','loadData','updateBatch'),
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

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new News;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['News']))
		{
			$model->attributes=$_POST['News'];

			if($model->save()){
				if(isset($_FILES) && !empty($_FILES['pic_src']['tmp_name'])){
					$file=CUploadedFile::getInstanceByName('pic_src');
					$news_id=$model->getDbConnection()->getLastInsertID();
					$target_file='../upload/outlets/news_ad/'.$news_id.'.'.$file->getExtensionName();
					$model->updateByPk($news_id,array('news_ad'=>$target_file));
					$file->saveAs($target_file);
					}
				$this->redirect(array('view','id'=>$model->news_id));
			}
		}

//		新闻分类
		$criteria=new CDbCriteria;
		$criteria->order='cat_id desc';
	  	$cates=NewsCate::model()->findAll($criteria);
	  	
		$this->render('create',array(
			'model'=>$model,
			'cates'=>$cates,
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['News']))
		{
			$model->attributes=$_POST['News'];
			if(isset($_FILES) && !empty($_FILES['pic_src']['tmp_name'])){
				$file=CUploadedFile::getInstanceByName('pic_src');
				$target_file='../upload/outlets/news_ad/'.$model->news_id.'.'.$file->getExtensionName();
				$model->news_ad=$target_file;
			}
			if($model->save()){
				if(isset($_FILES) && !empty($_FILES['pic_src']['tmp_name']))
					$file->saveAs($target_file);
				$this->redirect(array('view','id'=>$model->news_id));
				
			}
		}

		//		新闻分类
		$criteria=new CDbCriteria;
		$criteria->order='cat_id desc';
	  	$cates=NewsCate::model()->findAll($criteria);
	  	
		$this->render('update',array(
			'model'=>$model,
			'cates'=>$cates,
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
                            echo $this->loadModel($v)->delete();
			// we only allow deletion via POST request
			//$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			//if(!isset($_GET['ajax']))
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
    //        $this->layout='//layouts/column1';
	//	$dataProvider=new CActiveDataProvider('News');
		$this->render('index',array(
	//		'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new News('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['News']))
			$model->attributes=$_GET['News'];

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
		$model=News::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='news-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
