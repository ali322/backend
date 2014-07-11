<?php
Yii::import('ext.easyui.EasyuiWidget');
class EasyuiDatetimeBox extends EasyuiWidget{
    public $options=array();
    
    public function run(){
        list($name,$id)=$this->resolveNameID();
        if(isset($this->htmlOptions['id']))
	   $id=$this->htmlOptions['id'];
        else
	   $this->htmlOptions['id']=$id;
        if(isset($this->htmlOptions['name']))
	   $name=$this->htmlOptions['name'];
        $htmlOptions='';
	foreach($this->options as $k=>$v){
			$htmlOptions.="{$k}:'{$v}',";
	}
      //  echo $this->model;
        echo CHtml::activeTextField($this->model,$this->attribute,$this->htmlOptions);

        Yii::app()->clientScript->registerScript(__CLASS__.$id,"
                  using('datetimebox',function(){
                        $('#{$id}').datetimebox({
                           $htmlOptions
                        });
                  })
        ");
    }
}
?>
