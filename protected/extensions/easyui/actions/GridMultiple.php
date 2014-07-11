<?php
class GridMultiple extends CAction{
    public function run(){
       if($_GET){
            $formConfig=strip_tags(trim($_GET['formconfig']));
            $modelName=strip_tags(trim($_GET['model']));
            $modelName=explode('.',$modelName);
            Yii::import('application.modules.'.$modelName[0].'.models.'.$modelName[1]);
          //  CVarDumper::dump()
            $model=new $modelName[1];
            $href=strip_tags(trim($_GET['href']));
            $form=new CForm('application.components.forms.'.$formConfig,$model);
            $this->controller->render('ext.easyui.actions.views.multipleview',array('model'=>$model,'form'=>$form,'href'=>$href));
        }
    }
}
?>
