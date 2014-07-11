<?php

class OrderController extends Controller
{
        public function actions(){
           return array(
               'loadData'=>array(
                   'class'=>'ext.easyui.actions.LoadData',
                   'modelName'=>'Order',
                   'sortColumn'=>array('t.add_time','desc'),
                   'selects'=>array('id','order_sn','order_amount','money_paid','user_id','order_status','pay_status','pay_name','ship_name','add_time'),
                   'relationColumns'=>array(
                       'user_id'=>array('user','username'),
                   //    'brand_id'=>array('brand','brand_name'),
                   ),
                   'relationSearchColumns'=>array(
                       'user_id'=>'user.username',
                   ),
                   'lookupColumns'=>array(
                    //   'in_shop'
                        'pay_status','order_status'
                       ),
               ),
                
                'updateBatch'=>array(
                   'class'=>'ext.easyui.actions.UpdateBatch',
                   'modelName'=>'Order',
                    'idField'=>'id',
                )
            );
        }
        
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
				'actions'=>array('index','view','print'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','admin','delete','loadData'),
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
        
        
	public function actionIndex()
	{
         //       $this->layout='//layouts/column1';
		$this->render('index');
	}
        public function actionView($id){
            	$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
        }
        public function actionPrint($id){
                $order=$this->loadModel($id);
                $consignee=explode(',',$order->consignee_info);
                
            	$this->render('print',array(
			'model'=>$order,
                        'consignee'=>$consignee,
		));
        }
        
        public function actionUpdate($id){
            $model=$this->loadModel($id);
            if(isset($_POST['Order'])){
			$model->attributes=$_POST['Order'];
                        if($model->save())
                                $this->redirect(array('view','id'=>$model->id));
            }
            $this->render('update',array(
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
		$model=Order::model()->findByPk((int)$id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}
}