<?php
 Yii::import("ext.helpers.Helper_Array");
class GoodsCateController extends Controller
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
                   'modelName'=>'GoodsCate',
                   'sortColumn'=>array('t.cat_id','desc'),
                   'selects'=>array('cat_id','cat_name','cat_desc','parent_id','level','sort_order'),
                   'relationColumns'=>array(
                  //     'cat_id'=>array('cate','cat_name'),
                   //    'brand_id'=>array('brand','brand_name'),
                   ),
                   'lookupColumns'=>array(
                    //   'in_shop'
                    //   'is_on_sale','is_recommend'
                       ),
               ),
                
                'updateBatch'=>array(
                   'class'=>'ext.easyui.actions.UpdateBatch',
                   'modelName'=>'GoodsCate',
                    'idField'=>'cat_id',
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
			//	'actions'=>array('index','view','childcate'),
			//	'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','delete','remoteData','index','view','loadData','updateBatch'),
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

	public function actionChildCate(){
		$p_id=(int)$_POST['GoodsCate']['parent_id'];
		$c_cates=GoodsCate::model()->get_dynamic_cate($p_id);
	//	$html='';
		echo CHtml::dropDownList('GoodsCate[p_id]', '', $c_cates);
	//	echo $html;
	//	CVarDumper::dump($c_cates);
	}
	
        public function actionRemoteData(){
            	$criteria=new CDbCriteria;
		$p_cates=GoodsCate::model()->findAll($criteria);
                foreach ($p_cates as $key=>$row){
                        foreach ($row as $k=>$v){
                           $data[$key]['id']=$row['cat_id'];
                           $data[$key]['text']=$row['cat_name'];
                           $data[$key]['parent']=$row['parent_id'];
                        }
                 }
               //  CVarDumper::dump($data);
                 $refs=null;
                 exit(CJavaScript::jsonEncode(Helper_Array::toTree($data,'id','parent','children',$refs)));
        }
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new GoodsCate;

	//	$criteria=new CDbCriteria;
	//	$criteria->order='cat_id asc';
	//	$criteria->condition='parent_id =0';
	//	$p_cates=GoodsCate::model()->findAll($criteria);
		/*
		$p_cates=GoodsCate::model()->get_dynamic_cate(0);
		*/
	//	CVarDumper::dump($p_cates);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		
		if(isset($_POST['GoodsCate']))
		{
			$model->attributes=$_POST['GoodsCate'];
	//		$model->parent_id=$_POST['GoodsCate']['p_id'];
			if($model->save()){
				//增加左右值
					if($model->addsort($model->cat_id,$model->parent_id))
						$this->redirect(array('view','id'=>$model->cat_id));
			}
		}

		$this->render('create',array(
			'model'=>$model,
		//	'p_cates'=>$p_cates,
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
		/*
		$criteria=new CDbCriteria;
		$criteria->order='cat_id asc';
		$p_cates=GoodsCate::model()->findAll($criteria);

		$p_cates=GoodsCate::model()->get_dynamic_cate(0);
		*/
	//	CVarDumper::dump($p_cates);exit;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['GoodsCate']))
		{
			$model->attributes=$_POST['GoodsCate'];
		//	$model->parent_id=$_POST['GoodsCate']['p_id'];
			if($model->save()){
				if($model->moveCategory($model->cat_id,$model->parent_id))
					$this->redirect(array('view','id'=>$model->cat_id));
			}
		}

		$this->render('update',array(
			'model'=>$model,
		//	'p_cates'=>$p_cates,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
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
	//	header('content-type:text/html;charset=utf8');
	//	CVarDumper::dump($cates=GoodsCate::model()->display_tree(36));exit;
	//	$dataProvider=new CActiveDataProvider('GoodsCate');
		$this->render('index',array(
	//		'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new GoodsCate('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['GoodsCate']))
			$model->attributes=$_GET['GoodsCate'];

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
		$model=GoodsCate::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='goods-cate-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
