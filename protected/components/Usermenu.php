<?php
Yii::import("zii.widgets.CPortlet");
Yii::import("ext.helpers.*");
class Usermenu extends CPortlet{
	public function init(){
		parent::init();
	}

	public function renderContent(){
			$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('usermenu',array('model'=>$model));
	}
}
?>
