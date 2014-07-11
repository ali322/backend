<?php
Yii::import('ext.easyui.EasyuiWidget');
class EasyuiPanel extends EasyuiWidget{
    public $options=array();
    
    public function init(){
        parent::init();
        $msg_cat=!isset($this->owner->module)?'project':$this->owner->module->id;
        $title=Yii::t($msg_cat,ucfirst($this->owner->action->id).' '.ucfirst($this->owner->id));
        echo CHtml::openTag('div',array(
            'id'=>'panel_wrapper',
            'class'=>'easyui-panel',
            'title'=>$title,
            'style'=>'width:1250px;height:630px;',
            'iconCls'=>'icon-save',
	    'collapsible'=>'false',
            'minimizable'=>'true',
	    'maximizable'=>'true',
            'closable'=>'true'
            ));
        echo CHtml::openTag('div',array('class'=>'toolbar_wrapper'));
        echo '<a href="javascript:history.go(-1);" class="easyui-linkbutton" iconCls="icon-back"  plain="true">'.Yii::t('easyui','Back').'</a>';
        echo '<a href="javascript:history.go(+1);" class="easyui-linkbutton" iconCls="icon-front"  plain="true">'.Yii::t('easyui','Foward').'</a>';
        echo '<a href="javascript:window.location.reload();" class="easyui-linkbutton" iconCls="icon-reload"  plain="true">'.Yii::t('easyui','Refresh').'</a>';
        echo '<a href="javascript:window.location.href=\''.$this->owner->createUrl('index').'\';" class="easyui-linkbutton" iconCls="icon-tip"  plain="true">'.Yii::t('easyui','Back to Index').'</a>';
        echo CHtml::closeTag('div');
        echo CHtml::openTag('div',array('class'=>'panel_main'));
    }
    public function run(){
        echo CHtml::closeTag('div');
        echo CHtml::closeTag('div');
        
         
         Yii::app()->clientScript->registerCss(__CLASS__,"
             #panel_wrapper{padding:0px;padding-top:0;}
             .panel_main{padding:6px;}
             .toolbar_wrapper{padding:3px;background:#fafafa;height:30px;line-height:30px;}
         ");
    }
}
?>
