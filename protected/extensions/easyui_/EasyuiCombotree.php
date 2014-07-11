<?php
Yii::import('ext.easyui.EasyuiWidget');
Yii::import("ext.helpers.Helper_Array");
/*root node's parent_id has to be 0,lft value 1,rgt value 2*/
class EasyuiCombotree extends EasyuiWidget{
  public $model;
  public $attribute;
  public $url;
  public $s_class;
  public $change_func;
  public function run(){
     list($name,$id)=$this->resolveNameID();
     if(isset($this->htmlOptions['id']))
	   $id=$this->htmlOptions['id'];
     else
	   $this->htmlOptions['id']=$id;
     if(isset($this->htmlOptions['name']))
	   $name=$this->htmlOptions['name'];
     $this->htmlOptions['class']=$this->s_class;
     $value=$this->hasModel()?$this->model->{$this->attribute}:$this->value;
     echo '<input id="'.$id.'" value="'.$value.'" style="width:150px;">';
     echo CHtml::hiddenField($name,$value,  array_merge($this->htmlOptions,array('id'=>'mask_'.$id)));

     Yii::app()->clientScript->registerScript(__CLASS__.$id,"
                  using('combotree',function(){
                        $('#{$id}').combotree({
                            url:'{$this->url}',
                            onChange:function(n_val,o_val){
                                $('#mask_{$id}').val(n_val);
                                {$this->change_func}
                            }
                        });
                  })
     ");
  }
  
}
?>
