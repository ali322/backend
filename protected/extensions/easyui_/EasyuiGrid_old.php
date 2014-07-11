<?php
Yii::import('ext.easyui.EasyuiWidget');
//Yii::import('ext.easyui.EasyuiGridView');
class EasyuiGrid extends EasyuiWidget{
	
	public $model;
	public $title;
	public $idField;
	
	public $url;
	public $js=array();
	
	public $columns;
	
	public $htmlOptions=array();
	
	public $toolbar_show=array();
	public $toolbars;
	

	public function run(){
	//	parent::run();
		
		echo '<table id="grid_wrap"></table>';
		$htmlOptions='';
		foreach($this->htmlOptions as $k=>$v){
			$htmlOptions.="{$k}:'{$v}',";
		}

		$this->cs->registerScript(__CLASS__,"
				using(['datagrid','window'],function(){
					$('#grid_wrap').datagrid({
					title:'{$this->title}',
                                        pageList:[13,15,17,20],
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
					toolbar:{$this->initToolbar()},
                                        onLoadError:function(data){
                                                          using('messager',function(){
                                                               $.messager.alert('".Yii::t('easyui', 'Warning')."','".Yii::t('easyui', 'remote data error')."','error');
                                                           });
                                                     }
					});
				});
			",CClientScript::POS_HEAD);
			
			$this->initOperations();
	}
	
	public function initToolbar(){
		$toolbars=array();
	
		/*添加*/
		if(isset($this->toolbar_show['add'])){
                        $toolbars[]=array('id'=>'btnadd','text'=>(isset($this->toolbar_show['add']['text'])?$this->toolbar_show['add']['text']:Yii::t('easyui', 'Add')),'iconCls'=>'icon-add','handler'=>'addRow');
			$this->cs->registerScript('addRow',"
				function addRow(){
                                          using('dialog',function(){
                                                $('#operation_window').show().dialog({ 
							title: '".Yii::t("easyui", "Add")."',
							content:'<iframe name=\"addFrame\"  src=\"{$this->toolbar_show['add']['href']}\" marginheight=0 marginwidth=0  scrolling=\"auto\" framespacing=0 frameborder=0 width=\"100%\" height=\"100%\"></iframe>',
                                                        width:900,  
                                                        height:500,
                                                        closable:true, 
                                                        maximizable:true,
                                                        resizable:true,
                                                        doSize:true, 
                                                        modal:true,
                                                        onClose:function(){
                                                        $('#grid_wrap').datagrid('reload');
							//	window.location.reload();
							}
						}); 
                                          });
				}
			",CClientScript::POS_END);
                        $toolbars[]='-';
		}
	
		/*搜索*/
		
		if(isset($this->toolbar_show['search'])){
                        $toolbars[]=array('id'=>'btnsearch','text'=>(isset($this->toolbar_show['search']['text'])?$this->toolbar_show['search']['text']:Yii::t('easyui', 'Search')),'iconCls'=>'icon-search','handler'=>'searchRow');
			echo CHtml::openTag('div',array('id'=>'search_window','style'=>'display:none;'))."\n";
			$model=new $this->model;
                        $this->widget('ext.easyui.EasyuiGridViews.GridSearch',array('model'=>$model,'columns'=>$this->columns,'href'=>$this->toolbar_show['search']['href'],'formConfig'=>$this->toolbar_show['search']['formTpl']));
			echo CHtml::closeTag('div')."\n";
			
			$this->cs->registerScript('searchRow',"
				function searchRow(){
						$('#search_window').show().window({ 
						title: '".(isset($this->toolbar_show['search']['text'])?$this->toolbar_show['search']['text']:Yii::t('easyui', 'Search'))."',
    						width:280,  
    						height:300,
    						closable:true,
    						minimizable:false,
    						maximizable:false,
    						collapsible:false, 
    						doSize:true, 
    						modal:true,
    						onClose:function(){
                                               //         $('#grid_wrap').datagrid('reload');
							//	window.location.reload();
							}
						}); 
				}
			",CClientScript::POS_END);
                        $toolbars[]='-';
		}
		/*删除*/
		
		if(isset($this->toolbar_show['delete'])){
                        $toolbars[]=array('id'=>'btndel','text'=>(isset($this->toolbar_show['delete']['text'])?$this->toolbar_show['delete']['text']:Yii::t('easyui', 'Delete')),'iconCls'=>'icon-cut','handler'=>'deleteRow');
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
						using('messager',function(){
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
                                                                                        using('messager',function(){
                                                                                                $.messager.alert('".Yii::t('easyui', 'Warning')."','".Yii::t('easyui', 'no rows selected')."','warning');
                                                                                        });
                                                                        }
								}
							});
						});
					}
			",CClientScript::POS_END);
                        $toolbars[]='-';
		}

                /*批量操作 batch operations*/
		if(isset($this->toolbar_show['multiple'])){
                        $toolbars[]=array('id'=>'btnpencil','text'=>(isset($this->toolbar_show['multiple']['text'])?$this->toolbar_show['multiple']['text']:Yii::t('easyui', 'Multiple')),'iconCls'=>'icon-edit','handler'=>'multipleRow');
                        echo CHtml::openTag('div',array('id'=>'multiple_window','style'=>'display:none;'))."\n";
			$model=new $this->model;
                        $this->widget('ext.easyui.EasyuiGridViews.GridMultiple',array('model'=>$model,'columns'=>$this->columns,'href'=>$this->toolbar_show['multiple']['href'],'formConfig'=>$this->toolbar_show['multiple']['formTpl']));
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
                                            $('#batch_id').val(getSelected());
                                            $('#multiple_window').show().window({ 
						title: '".(isset($this->toolbar_show['multiple']['text'])?$this->toolbar_show['multiple']['text']:Yii::t('easyui', 'Multiple'))."',
    						width:280,  
    						height:300,
    						closable:true,
    						minimizable:false,
    						maximizable:false,
    						collapsible:false, 
    						doSize:true, 
    						modal:true,
    						onClose:function(){
                                                        $('#grid_wrap').datagrid('reload');
							//	window.location.reload();
							}
					    }); 
					}
			",CClientScript::POS_END);
                        $toolbars[]='-';
		}
                
                /*导出excel*/
                
                $toolbars[]=array('id'=>'btnexport','text'=>Yii::t('easyui', 'Export Excel'),'iconCls'=>'icon-export','handler'=>'exportRow');
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
                
		 return CJavaScript::jsonEncode($toolbars);
	}
	
	public function initColumns(){
		return CJavaScript::jsonEncode($this->columns);
	}
	
	public function initOperations(){
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
		echo CHtml::openTag('div',array('id'=>'operation_window','style'=>'display:none;'))."\n";
		echo CHtml::closeTag('div')."\n";
		
		$this->cs->registerScript('editRow',"
			function editRow(row_id){
                                         using('dialog',function(){
                                                $('#operation_window').show().dialog({ 
							title: '".Yii::t("easyui", "Edit")."',
							content:'<iframe name=\"editFrame\"  src=\"{$this->toolbar_show['edit']['href']}/id/'+row_id+'\" marginheight=0 marginwidth=0  scrolling=\"auto\" framespacing=0 frameborder=0 width=\"100%\" height=\"100%\"></iframe>',
                                                        width:900,  
                                                        height:500,
                                                        closable:true, 
                                                        maximizable:true,
                                                        resizable:true,
                                                        doSize:true, 
                                                        modal:true,
                                                        onClose:function(){
                                                        $('#grid_wrap').datagrid('reload');
							//	window.location.reload();
							}
						}); 
                                          });
			}
			function viewRow(row_id){
                                       using('dialog',function(){
                                                $('#operation_window').show().dialog({ 
							title: '".Yii::t("easyui", "View")."',
							content:'<iframe name=\"viewFrame\"  src=\"{$this->toolbar_show['view']['href']}/id/'+row_id+'\" marginheight=0 marginwidth=0  scrolling=\"auto\" framespacing=0 frameborder=0 width=\"100%\" height=\"100%\"></iframe>',
                                                        width:900,  
                                                        height:500,
                                                        closable:true, 
                                                        maximizable:true,
                                                        resizable:true,
                                                        doSize:true, 
                                                        modal:true,
                                                        onClose:function(){
                                                        $('#grid_wrap').datagrid('reload');
							//	window.location.reload();
							}
						}); 
                                          });
			}
		",CClientScript::POS_END);
	}
	
}