<?php
Yii::import('ext.easyui.EasyWidget');
class EasyuiTree extends  EasyuiWidget{

	public $items=array();
	public $js=array();
	
	public function run(){
		parent::run();
		
	//	$this->htmlOptions['class']=isset($this->htmlOptions['class'])?$this->htmlOptions['class']:'easyui-tree';
		$this->htmlOptions['id']=isset($this->htmlOptions['id'])?$this->htmlOptions['id']:'leftnav-tree';
	//	$this->htmlOptions['animate']=isset($this->htmlOptions['animate'])?$this->htmlOptions['animate']:true;
		echo CHtml::openTag('ul',$this->htmlOptions)."\n";
		
	//	CVarDumper::dump($this->items);
		foreach($this->items as $item){
			echo "<li><span>{$item['text']}</span><ul>";
			if(is_array($item['children'])){
				foreach($item['children'] as $row){
					echo '<li><span class="leftnav_node"><div url="'.$row['url'].'" id="tree_target_'.$row['id'].'" class="tree_target" style="text-decoration:none">'.$row['text'].'</div></span></li>';
				}
			}
			echo '</ul></li>';
		}
		
		echo CHtml::closeTag('ul')."\n";
		

		$this->cs->registerScript(__CLASS__.$this->htmlOptions['id'],"
					$('#{$this->htmlOptions['id']}').tree({
							animate:true,
							onClick:function(node){
										".$this->js['click']."
							}
					});
			",CClientScript::POS_READY);


	}
}