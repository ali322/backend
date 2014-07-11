<?php
Yii::import("ext.easyui.EasyuiWidget");
Yii::import("ext.easyui.EasyuiTree");
Yii::import("ext.helpers.Helper_Array");
class Leftnav extends EasyuiWidget{
	public function run(){
		parent::run();
                
                $accordings=array();
                
                $rows=array(
                    	array('id'=>1,'url'=>'','text'=>Yii::t('admin','outlets admin'),'parent'=>0),

			array('id'=>4,'url'=>Yii::app()->createUrl('cate/index'),'text'=>Yii::t('admin','outlets category'),'parent'=>1),
			array('id'=>5,'url'=>Yii::app()->createUrl('brand/index'),'text'=>Yii::t('admin','outlets brand'),'parent'=>1),
			array('id'=>6,'url'=>Yii::app()->createUrl('topic/index'),'text'=>Yii::t('admin','outlets topic'),'parent'=>1),
			array('id'=>16,'url'=>Yii::app()->createUrl('acts/index'),'text'=>Yii::t('admin','outlets acts'),'parent'=>1),
			array('id'=>6,'url'=>Yii::app()->createUrl('news/index'),'text'=>Yii::t('admin','outlets news'),'parent'=>1),
			array('id'=>8,'url'=>Yii::app()->createUrl('newsCate/index'),'text'=>Yii::t('admin','outlets news cate'),'parent'=>1),
                );
                $accordings['outlets_admin']=Helper_Array::toTree($rows,'id','parent','children');
                
                $rows=array(
                    	array('id'=>11,'url'=>'','text'=>Yii::t('admin','webshop admin'),'parent'=>0),
			array('id'=>12,'url'=>Yii::app()->createUrl('webshop/goods/index'),'text'=>Yii::t('admin','webshop goods'),'parent'=>11),
			array('id'=>13,'url'=>Yii::app()->createUrl('webshop/goodsCate/index'),'text'=>Yii::t('admin','webshop goodsCate'),'parent'=>11),
			array('id'=>14,'url'=>Yii::app()->createUrl('webshop/goodsCateAttr/index'),'text'=>Yii::t('admin','webshop goodsCateAttr'),'parent'=>11),
			array('id'=>15,'url'=>Yii::app()->createUrl('webshop/groupGoods/index'),'text'=>Yii::t('admin','webshop groupGoods'),'parent'=>11),
                        array('id'=>19,'url'=>Yii::app()->createUrl('webshop/order/index'),'text'=>Yii::t('admin','webshop Order'),'parent'=>11),
                );
                $accordings['webshop_admin']=Helper_Array::toTree($rows,'id','parent','children');
                
                $rows=array(
                    	array('id'=>2,'url'=>'','text'=>Yii::t('admin','image admin'),'parent'=>0),
			array('id'=>7,'url'=>Yii::app()->createUrl('pic/index'),'text'=>Yii::t('admin','9448 pics'),'parent'=>2),
                );
                $accordings['image_admin']=Helper_Array::toTree($rows,'id','parent','children');
                
		$rows=array(
		    array('id'=>3,'url'=>'','text'=>Yii::t('admin','project admin'),'parent'=>0),
                    array('id'=>19,'url'=>Yii::app()->createUrl('logs/index'),'text'=>Yii::t('admin','project logs'),'parent'=>3),
		    array('id'=>9,'url'=>Yii::app()->createUrl('issues/index'),'text'=>Yii::t('admin','project issues'),'parent'=>3),		    
		    array('id'=>10,'url'=>Yii::app()->createUrl('users/index'),'text'=>Yii::t('admin','sys users'),'parent'=>3),
		);
	//	$refs=null;
	//	$sources=Helper_Array::toTree($rows,'id','parent','children',$refs);
		$accordings['project_admin']=Helper_Array::toTree($rows,'id','parent','children',$refs);

                
		$js=array();
		$js['click']="
				function MyTabs(target_id,target_url,target_alt){
                                            this.target_url=target_url;
                                            this.target_alt=target_alt;
                                            this.target_id=target_id;
				}
				MyTabs.prototype.addTabs=function(){
                                    $('#tt').tabs('exists',this.target_alt)?$('#tt').tabs('select',this.target_alt):$('#tt').tabs('add',{
                                        title:this.target_alt,
                                        content:'<iframe style=\"padding-top:2px;padding-left:2px;\" scrolling=\"auto\" width=\"99%\" height=\"99%\" marginheight=0 marginwidth=0 frameborder=0 src=\"'+this.target_url+'\"></iframe>',
                                        closable:true
                                    });
				};
                                        if($(node.target).find('div.tree_target').length>0){
                                            var my_tabs=new MyTabs($(node.target).find('div.tree_target').attr('id'),$(node.target).find('div.tree_target').attr('url'),$(node.target).find('div.tree_target').text());
                                            my_tabs.addTabs();
                                        }
					return false;
		";
		
		
                $this->render('leftnav',array('accordings'=>$accordings,'js'=>$js));
		}
}
?>
