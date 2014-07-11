<?php
Yii::import('ext.easyui.EasyuiWidget');
Yii::import("ext.helpers.Helper_Array");
class EasyuiCombotree extends EasyuiWidget{
  /*异步加载url*/
  public $url;
  /*节点变化函数*/
  public $change_func='';
  
  
  public function run(){
     list($name,$id)=$this->resolveNameID();
     if(isset($this->htmlOptions['id']))
	   $id=$this->htmlOptions['id'];
     else
	   $this->htmlOptions['id']=$id;
     if(isset($this->htmlOptions['name']))
	   $name=$this->htmlOptions['name'];
     
     /*构建唯一ID*/
     $id=$id.'_'.$this->owner->action->id;
     
     $value=$this->hasModel()?$this->model->{$this->attribute}:$this->value;
     echo '<input id="'.$id.'" value="'.$value.'" style="width:150px;">';
     echo CHtml::hiddenField($name,$value,  array_merge($this->htmlOptions,array('id'=>'mask_'.$id)));

     if(!Yii::app()->clientScript->isScriptRegistered(__CLASS__.$id))
     Yii::app()->clientScript->registerScript(__CLASS__.$id,"
                        $('#{$id}').combotree({
                            url:'{$this->url}',
                            onChange:function(n_val,o_val){
                                $('#mask_{$id}').val(n_val);
                                {$this->change_func}
                            }
                        });
     ",CClientScript::POS_READY);
  }
  
}
?>
