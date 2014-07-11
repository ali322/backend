<?php
Yii::import('ext.easyui.EasyuiWidget');
class EasyuiGrid extends EasyuiWidget{
	
	public $modelName;
	public $title;
	public $idField;
	
	public $url;
	
	public $columns;
	
	
	public $toolbar_show=array();
	
        public function init(){
            parent::init();
            $this->initWindow();
            $this->initToolbar();
	    $this->initOperations();
        }

        private function initColumns(){
		return CJavaScript::jsonEncode($this->columns);
	}
        
      
	public function run(){
                echo CHtml::tag('table',array('id'=>'grid_wrap'),'',true);
		$htmlOptions='';
		foreach($this->htmlOptions as $k=>$v){
			$htmlOptions.="{$k}:'{$v}',";
		}
                
            //    echo CHtml::scriptFile('http://www.jeasyui.com/easyui/datagrid-detailview.js');

		$this->cs->registerScript(__CLASS__,"
					$('#grid_wrap').datagrid({
					title:'{$this->title}',
                                        pageList:[16,17,18,19,20],
					$htmlOptions
					url: '{$this->url}',
					columns:[
							[
								{title:'".Yii::t('easyui', 'Base Information')."',colspan:".count($this->columns)."},
								{field:'opt',title:'".Yii::t('easyui', 'Operation')."',width:60,align:'center',rowspan:2,
												formatter:function(value,rowData,rowIndex){return operationRow(rowData.{$this->idField});}
											}
							],
							{$this->initColumns()}
	
						],
					toolbar:'#my_tb',
                                        onLoadError:function(data){
                                                               $.messager.alert('".Yii::t('easyui', 'Warning')."','".Yii::t('easyui', 'remote data error')."','error');
                                                     }
					});
			",CClientScript::POS_READY);
	}
	
        private function initWindow(){
                echo CHtml::tag('div',array('id'=>'datagrid_window','style'=>'display:none;'),'',true);
                $js='
                    function initWindow(id,cache){
                        if(cache){
                            if($("#"+id).length==0)
                                $("#datagrid_window").after("<div id=\'"+id+"\' style=\'display:none;\'></div>");
                            return $("#"+id);
                        }else
                            return $("#datagrid_window");
                    }
                ';
                $this->cs->registerScript('initWindow',$js,CClientScript::POS_END);
            
        }
        
	private function initToolbar(){
	//	$toolbars=array();
                echo CHtml::openTag('div',array('id'=>'my_tb'));
                echo CHtml::openTag('div',array('class'=>'my_tb_f'));
		/*添加*/
		if(isset($this->toolbar_show['add'])){
                    echo CHtml::link((isset($this->toolbar_show['add']['text'])?$this->toolbar_show['add']['text']:Yii::t('easyui', 'Add')),'javascript:void(0)',array('iconCls'=>'icon-add','class'=>'easyui-linkbutton','plain'=>'true','id'=>'btnadd','onclick'=>'addRow()'));
                //        $toolbars[]=array('id'=>'btnadd','text'=>(isset($this->toolbar_show['add']['text'])?$this->toolbar_show['add']['text']:Yii::t('easyui', 'Add')),'iconCls'=>'icon-add','handler'=>'addRow');
             //     echo CHtml::openTag('div',array('id'=>'add_window','style'=>'display:none;'));
          //          echo '<iframe src="'.$this->toolbar_show['add']['href'].'" marginheight=0 marginwidth=0  scrolling="none" framespacing=0 frameborder=0 width="100%" height="99%"></iframe>';
            //        echo CHtml::closeTag('div');
			$this->cs->registerScript('addRow',"
				function addRow(){
                                                initWindow('add_window',false).show().window({ 
							title: '".Yii::t("easyui", "Add")."',
                                                        href:'{$this->toolbar_show['add']['href']}',
                                                        width:900,  
                                                        height:500,
                                                        collapsible:false,
                                                        modal:true,
                                                        cache:false,
                                                        onClose:function(){
                                                            $('#grid_wrap').datagrid('reload');
							}
						});
				}
			",CClientScript::POS_END);
                   //  echo '<div class="datagrid-btn-separator"></div>';                                    
                     echo CHtml::tag('div',array('class'=>'datagrid-btn-separator'),'',true);
                    //    $toolbars[]='-';
		}
	
		/*搜索*/
		
		if(isset($this->toolbar_show['search'])){
                    echo CHtml::link((isset($this->toolbar_show['search']['text'])?$this->toolbar_show['search']['text']:Yii::t('easyui', 'Search')),'javascript:void(0)',array('iconCls'=>'icon-search','class'=>'easyui-linkbutton','plain'=>'true','id'=>'btnsearch','onclick'=>'searchRow()'));
                     //   $toolbars[]=array('id'=>'btnsearch','text'=>(isset($this->toolbar_show['search']['text'])?$this->toolbar_show['search']['text']:Yii::t('easyui', 'Search')),'iconCls'=>'icon-search','handler'=>'searchRow');
		//	echo CHtml::openTag('div',array('id'=>'search_window','style'=>'display:none;'))."\n";
		//	$model=new $this->model;
                  //      $this->widget('ext.easyui.EasyuiGridViews.GridSearch',array('model'=>$model,'columns'=>$this->columns,'href'=>$this->toolbar_show['search']['href'],'formConfig'=>$this->toolbar_show['search']['formTpl']));
		//	echo CHtml::closeTag('div')."\n";
			
			$this->cs->registerScript('searchRow',"
				function searchRow(){
                                                var s_tpl_url='".Yii::app()->createUrl('public/gridSearch',array('model'=>$this->modelName,'href'=>$this->toolbar_show['search']['href'],'formconfig'=>$this->toolbar_show['search']['formTpl']))."';
						initWindow('search_window',true).show().window({ 
						title: '".(isset($this->toolbar_show['search']['text'])?$this->toolbar_show['search']['text']:Yii::t('easyui', 'Search'))."',
                                                href:s_tpl_url,
                                                width:280,  
    						height:300,
                                                modal:true,
    						minimizable:false,
    						maximizable:false,
    						collapsible:false 
						}); 
				}
			",CClientScript::POS_END);
                   //  echo '<div class="datagrid-btn-separator"></div>'; 
                     echo CHtml::tag('div',array('class'=>'datagrid-btn-separator'),'',true);
                    //    $toolbars[]='-';
		}
		/*删除*/
		
		if(isset($this->toolbar_show['delete'])){
                    echo CHtml::link((isset($this->toolbar_show['delete']['text'])?$this->toolbar_show['delete']['text']:Yii::t('easyui', 'Delete')),'javascript:void(0)',array('iconCls'=>'icon-cut','class'=>'easyui-linkbutton','plain'=>'true','id'=>'btndel','onclick'=>'deleteRow()'));
                       // $toolbars[]=array('id'=>'btndel','text'=>(isset($this->toolbar_show['delete']['text'])?$this->toolbar_show['delete']['text']:Yii::t('easyui', 'Delete')),'iconCls'=>'icon-cut','handler'=>'deleteRow');
			$this->cs->registerScript('deleteRow',"
					function deleteRow(){
                                                function getSelected_(){
                                                   var ids = [];
                                                   var rows = $('#grid_wrap').datagrid('getSelections');
                                                   for(var i=0;i<rows.length;i++){
                                                            ids.push(rows[i].{$this->idField});
                                                   }
                                                   return ids.join(',');
                                                }
                                                $.messager.confirm('".Yii::t("easyui", "Delete")."', '".Yii::t("easyui", "Are you confirm delete them?")."', function(r){
                                                        if (r){
                                                                var rows = $('#grid_wrap').datagrid('getSelections');
                                                                var rows_=getSelected_();
                                                                if(rows!=null){
                                                                                for(var i=0;i<rows.length;i++){
                                                                                        var index = $('#grid_wrap').datagrid('getRowIndex', rows[i]);
                                                                                        $('#grid_wrap').datagrid('deleteRow', index);
                                                                                }
                                                                                $.get('{$this->toolbar_show['delete']['href']}/id/'+rows_,function(data){
                                                                                                if(data){
                                                                                                                 $.messager.show({
                                                                                                                                title:'".Yii::t("easyui", "Operation Result")."',
                                                                                                                                msg:data==1?'".Yii::t("easyui", "delete success")."':'".Yii::t("easyui", "delete faile")."',
                                                                                                                                showType:'show'
                                                                                                                        });
                                                                                                }
                                                                                });
                                                                }else{
                                                                       $.messager.alert('".Yii::t('easyui', 'Warning')."','".Yii::t('easyui', 'no rows selected')."','warning');
                                                                }
                                                        }
                                                });
					}
			",CClientScript::POS_END);
                       // $toolbars[]='-';
                    //   echo '<div class="datagrid-btn-separator"></div>'; 
                     echo CHtml::tag('div',array('class'=>'datagrid-btn-separator'),'',true);
		}

                /*批量操作 batch operations*/
		if(isset($this->toolbar_show['multiple'])){
                    echo CHtml::link((isset($this->toolbar_show['multiple']['text'])?$this->toolbar_show['multiple']['text']:Yii::t('easyui', 'Multiple')),'javascript:void(0)',array('iconCls'=>'icon-edit','class'=>'easyui-linkbutton','plain'=>'true','id'=>'btnpencil','onclick'=>'multipleRow()'));
                  //      $toolbars[]=array('id'=>'btnpencil','text'=>(isset($this->toolbar_show['multiple']['text'])?$this->toolbar_show['multiple']['text']:Yii::t('easyui', 'Multiple')),'iconCls'=>'icon-edit','handler'=>'multipleRow');
                        echo CHtml::openTag('div',array('id'=>'multiple_window','style'=>'display:none;'))."\n";
			//$model=new $this->model;
                      //  $this->widget('ext.easyui.EasyuiGridViews.GridMultiple',array('model'=>$model,'columns'=>$this->columns,'href'=>$this->toolbar_show['multiple']['href'],'formConfig'=>$this->toolbar_show['multiple']['formTpl']));
			echo CHtml::closeTag('div')."\n";
			$this->cs->registerScript('multipleRow',"
                                        function getSelected(){
                                           var ids = [];
                                           var rows = $('#grid_wrap').datagrid('getSelections');
                                           for(var i=0;i<rows.length;i++){
                                                    ids.push(rows[i].{$this->idField});
                                           }
                                           return ids.join(',');
                                        }
					function multipleRow(){
                                            var m_tpl_url='".Yii::app()->createUrl('public/gridMultiple',array('model'=>$this->modelName,'href'=>$this->toolbar_show['multiple']['href'],'formconfig'=>$this->toolbar_show['multiple']['formTpl']))."';
                                            $('#batch_id').val(getSelected());
                                            $('#multiple_window').show().window({ 
						title: '".(isset($this->toolbar_show['multiple']['text'])?$this->toolbar_show['multiple']['text']:Yii::t('easyui', 'Multiple'))."',
                                                href:m_tpl_url,
    						width:280,  
    						height:300,
                                                modal:true,
    						minimizable:false,
    						maximizable:false,
    						collapsible:false, 
    						onClose:function(){
                                                        $('#grid_wrap').datagrid('reload');
							}
					    }); 
					}
			",CClientScript::POS_END);
                    //    $toolbars[]='-';
                        echo CHtml::tag('div',array('class'=>'datagrid-btn-separator'),'',true);
                    //    echo '<div class="datagrid-btn-separator"></div>'; 
		}
                
                /*导出excel*/
                /*
                echo CHtml::link(Yii::t('easyui', 'Export Excel'),'javascript:void(0)',array('iconCls'=>'icon-export','class'=>'easyui-menubutton','menu'=>'#export_submenu','plain'=>'true','id'=>'btnexport','onclick'=>'exportRow()'));
                echo CHtml::openTag('div',array('id'=>'export_submenu'));
                echo '<div iconCls="icon-export">'.Yii::t('easyui', 'Export All').'</div>';
             //   echo '<div class="menu-sep"></div>';
                echo '<div iconCls="icon-export">'.Yii::t('easyui', 'Export Selected').'</div>';
                echo CHtml::closeTag('div');

                //   $toolbars[]=array('id'=>'btnexport','text'=>Yii::t('easyui', 'Export Excel'),'iconCls'=>'icon-export','handler'=>'exportRow');
		$this->cs->registerScript('exportRow',"
                    function exportRow(){
                        var rows = $('#grid_wrap').datagrid('getData');
                        $.ajax({
                            type:'POST',
                            url:'".$this->owner->createUrl('exportExcel')."',
                            data:rows,
                            dataType:'xml',
                            success:function(data){
                                alert(data);
                            }
                        });
                    }
                ",CClientScript::POS_END); 
                */
                echo CHtml::closeTag('div');
                echo CHtml::closeTag('div');
	//	 return CJavaScript::jsonEncode($toolbars);
	}
	
	
	private function initOperations(){
		$this->cs->registerScript('operationRow',"
			function operationRow(row_id){
				buttons='<div id=\"Operation_'+row_id+'\" class=\"buttons\">';			
				buttons+='<input type=\"button\" onclick=\"editRow('+row_id+')\" style=\"margin-right:3px;\" value=\"".(isset($this->toolbar_show['edit']['text'])?$this->toolbar_show['edit']['text']:Yii::t('easyui', 'Edit'))."\">';
				buttons+='<input type=\"button\" onclick=\"viewRow('+row_id+')\" style=\"margin-right:3px;\" value=\"".(isset($this->toolbar_show['view']['text'])?$this->toolbar_show['view']['text']:Yii::t('easyui', 'View'))."\">';
				buttons+='</div>';
				
				return buttons;
			}
		",CClientScript::POS_END);

		/*操作窗口框架*/
            //    echo CHtml::tag('div',array('id'=>'edit_window','style'=>'display:none;'),'',true);
           //     echo CHtml::tag('div',array('id'=>'view_window','style'=>'display:none;'),'',true);
		
		$this->cs->registerScript('editRow',"
			function editRow(row_id){
                                                initWindow('add_window',false).show().window({ 
							title: '".Yii::t("easyui", "Edit")."',
                                                        href:'{$this->toolbar_show['edit']['href']}/id/'+row_id,
                                                        width:900,  
                                                        height:500,
                                                        collapsible:false,
                                                        cache:false,
                                                        modal:true,
                                                        onClose:function(){
                                                            $('#grid_wrap').datagrid('reload');
							}
						}); 
			}
		",CClientScript::POS_END);
                $this->cs->registerScript('viewRow',"
                        function viewRow(row_id){
                                initWindow('view_window',false).show().window({ 
                                        title: '".Yii::t("easyui", "View")."',
                                        href:'{$this->toolbar_show['view']['href']}/id/'+row_id,
                                        width:900,  
                                        height:500,
                                        collapsible:false,
                                        cache:false,
                                        modal:true,
                                        onClose:function(){
                                            $('#grid_wrap').datagrid('reload');
                                        }
                                }); 
			}    
                ",CClientScript::POS_END);
	}
	
}