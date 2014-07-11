<?php
/*
 * 后台公共控制器类
 */
class PublicController extends Controller{
    public function actions() {
        return array(
            'gridSearch'=>array(
                'class'=>'ext.easyui.actions.GridSearch',
            ),
            'gridMultiple'=>array(
                'class'=>'ext.easyui.actions.GridMultiple',
            ),
            'dxheditorUpload'=>array(
                'class'=>'ext.dxheditor.actions.Upload'
            )
        );
    }
    public function actionEasyload(){
        $this->render('easyload');
    }
}
?>
