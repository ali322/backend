<?php
Yii::import('ext.easyui.EasyuiWidget');
class EasyuiWindow extends EasyuiWidget{
public $targetId;
public $htmlOptions=array();
public $href;
	public function window(){
		$htmlOptions='';
		foreach($this->htmlOptions as $k=>$v){
			$htmlOptions.="{$k}:'{$v}',";
		}
		
		$this->cs->registerScript(__CLASS__,"
						$('#{$this->targetId}').show().window({ 
							$htmlOptions
							href:'{$this->href}'
						}); 
		");
	}
}