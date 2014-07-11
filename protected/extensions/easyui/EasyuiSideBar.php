<?php
Yii::import("ext.easyui.EasyuiWidget");
Yii::import("ext.helpers.Helper_Array");
class EasyuiSideBar extends EasyuiWidget{
    
    public function run(){
        $accordings=array();

        $rows=array(
                array('id'=>1,'url'=>'','text'=>Yii::t('admin','outlets_admin'),'parent'=>0),

                array('id'=>4,'url'=>Yii::app()->createUrl('cate/index'),'text'=>Yii::t('admin','outlets category'),'parent'=>1),
                array('id'=>5,'url'=>Yii::app()->createUrl('brand/index'),'text'=>Yii::t('admin','outlets brand'),'parent'=>1),
                array('id'=>6,'url'=>Yii::app()->createUrl('topic/index'),'text'=>Yii::t('admin','outlets topic'),'parent'=>1),
                array('id'=>16,'url'=>Yii::app()->createUrl('acts/index'),'text'=>Yii::t('admin','outlets acts'),'parent'=>1),
                array('id'=>6,'url'=>Yii::app()->createUrl('news/index'),'text'=>Yii::t('admin','outlets news'),'parent'=>1),
                array('id'=>8,'url'=>Yii::app()->createUrl('newsCate/index'),'text'=>Yii::t('admin','outlets news cate'),'parent'=>1),
        );
        $accordings['outlets_admin']=Helper_Array::toTree($rows,'id','parent','children');

        $rows=array(
                array('id'=>11,'url'=>'','text'=>Yii::t('admin','webshop_admin'),'parent'=>0),
                array('id'=>12,'url'=>Yii::app()->createUrl('webshop/goods/index'),'text'=>Yii::t('admin','webshop goods'),'parent'=>11),
                array('id'=>13,'url'=>Yii::app()->createUrl('webshop/goodsCate/index'),'text'=>Yii::t('admin','webshop goodsCate'),'parent'=>11),
                array('id'=>14,'url'=>Yii::app()->createUrl('webshop/goodsCateAttr/index'),'text'=>Yii::t('admin','webshop goodsCateAttr'),'parent'=>11),
                array('id'=>15,'url'=>Yii::app()->createUrl('webshop/groupGoods/index'),'text'=>Yii::t('admin','webshop groupGoods'),'parent'=>11),
                array('id'=>19,'url'=>Yii::app()->createUrl('webshop/order/index'),'text'=>Yii::t('admin','webshop Order'),'parent'=>11),
        );
        $accordings['webshop_admin']=Helper_Array::toTree($rows,'id','parent','children');

        $rows=array(
                array('id'=>2,'url'=>'','text'=>Yii::t('admin','image_admin'),'parent'=>0),
                array('id'=>7,'url'=>Yii::app()->createUrl('pic/index'),'text'=>Yii::t('admin','9448 pics'),'parent'=>2),
        );
        $accordings['image_admin']=Helper_Array::toTree($rows,'id','parent','children');

        $rows=array(
            array('id'=>3,'url'=>'','text'=>Yii::t('admin','project_admin'),'parent'=>0),
            array('id'=>19,'url'=>Yii::app()->createUrl('logs/index'),'text'=>Yii::t('admin','project logs'),'parent'=>3),
            array('id'=>9,'url'=>Yii::app()->createUrl('issues/index'),'text'=>Yii::t('admin','project issues'),'parent'=>3),		    
            array('id'=>10,'url'=>Yii::app()->createUrl('users/index'),'text'=>Yii::t('admin','sys users'),'parent'=>3),
        );
        //	$refs=null;
        //	$sources=Helper_Array::toTree($rows,'id','parent','children',$refs);
        $accordings['project_admin']=Helper_Array::toTree($rows,'id','parent','children',$refs);
        
        echo CHtml::openTag('div',array('id'=>'sidebar_wrap','class'=>'easyui-accordion','style'=>'width:158px;','fit'=>'true'));
        
        foreach($accordings as $key=>$value){
            echo CHtml::openTag('div',array('title'=>Yii::t('admin',$key)));
            
            echo CHtml::openTag('ul',array('class'=>'sidebar_tree'))."\n";
            foreach($value as $item){
                    echo "<li><span>{$item['text']}</span><ul>";
                    if(is_array($item['children'])){
                            foreach($item['children'] as $row){
                                    echo '<li><span class="sidebar_node"><div url="'.$row['url'].'" id="tree_target_'.$row['id'].'" class="tree_target" style="text-decoration:none">'.$row['text'].'</div></span></li>';
                            }
                    }
                    echo '</ul></li>';
            }

            echo CHtml::closeTag('ul')."\n";
            
            echo CHtml::closeTag('div');
        }
        echo CHtml::closeTag('div');
        
        $this->cs->registerScript(__CLASS__,"
            			function MyTabs(target_id,target_url,target_alt){
                                            this.target_url=target_url;
                                            this.target_alt=target_alt;
                                            this.target_id=target_id;
				}
				MyTabs.prototype.addTabs=function(){
                                    $('#tt').tabs('exists',this.target_alt)?$('#tt').tabs('select',this.target_alt):$('#tt').tabs('add',{
                                        title:this.target_alt,
                                        content:'<iframe scrolling=\"yes\" style=\"overflow-x:auto;\" width=\"100%\" height=\"100%\" marginheight=0 marginwidth=0 frameborder=0 src=\"'+this.target_url+'\"></iframe>',
                                        closable:true
                                    });
				};
                                $('.sidebar_tree').tree({
                                    animate:true,
                                    onClick:function(node){
                                        if($(node.target).find('div.tree_target').length>0){
                                            var my_tabs=new MyTabs($(node.target).find('div.tree_target').attr('id'),$(node.target).find('div.tree_target').attr('url'),$(node.target).find('div.tree_target').text());
                                            my_tabs.addTabs();
                                        }
					return false;
                                    }
                                });

        ",CClientScript::POS_READY);
    }
}
?>
