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
					toolbar:{$this->initToolbar()}
					});
				});
			",CClientScript::POS_HEAD);
			
			$this->initOperations();
	}
	
	public function initToolbar(){
		$toolbars=array();
	
		/*添加*/
		if(isset($this->toolbar_show['add'])){
                        $toolbars[]=array('id'=>'btnadd','text'=>(isset($this->toolbar_show['add']['text'])?$this->toolbar_show['add']['text']:Yii::t('easyui', 'Add')),'iconCls'=>'icon-add','handler'=>'function(){addRow()}');
			echo CHtml::openTag('div',array('id'=>'add_window','style'=>'display:none;'))."\n";
              //          echo '<iframe src="'.$this->toolbar_show['add']['href'].'" marginheight=0 marginwidth=0  scrolling="none" framespacing=0 frameborder=0 width="100%" height="99%"></iframe>';
			echo CHtml::closeTag('div')."\n";
			$this->cs->registerScript('addRow',"
				function addRow(){
                                                $('#add_window').show().window({ 
							title: '".(isset($this->toolbar_show['add']['text'])?$this->toolbar_show['add']['text']:Yii::t('easyui', 'Add'))."',
                                                        content:'<iframe name=\"addFrame\"  src=\"{$this->toolbar_show['add']['href']}\" marginheight=0 marginwidth=0  scrolling=\"auto\" framespacing=0 frameborder=0 width=\"100%\" height=\"100%\"></iframe>',
                                                        width:700,  
                                                        height:500,
                                                        closable:true, 
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
	
		/*搜索*/
		
		if(isset($this->toolbar_show['search'])){
                        $toolbars[]=array('id'=>'btnsearch','text'=>(isset($this->toolbar_show['search']['text'])?$this->toolbar_show['search']['text']:Yii::t('easyui', 'Search')),'iconCls'=>'icon-search','handler'=>'function(){searchRow()}');
			echo CHtml::openTag('div',array('id'=>'search_window','style'=>'display:none;'))."\n";
			$model=new $this->model;
                        $this->widget('application.components.EasyuiGridViews.GridSearch',array('model'=>$model,'columns'=>$this->columns,'href'=>$this->toolbar_show['search']['href'],'formConfig'=>$this->toolbar_show['search']['formTpl']));
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
                        $toolbars[]=array('id'=>'btndel','text'=>(isset($this->toolbar_show['delete']['text'])?$this->toolbar_show['delete']['text']:Yii::t('easyui', 'Delete')),'iconCls'=>'icon-cut','handler'=>'function(){deleteRow()}');
			$this->cs->registerScript('deleteRow',"
					function deleteRow(){
						using('messager',function(){
							$.messager.confirm('".Yii::t("easyui", "Delete")."', '".Yii::t("easyui", "Are you confirm delete them?")."', function(r){
								if (r){
									var rows = $('#grid_wrap').datagrid('getSelections');
									if(rows!=null){
											for(var i=0;i<rows.length;i++){
												var index = $('#grid_wrap').datagrid('getRowIndex', rows[i]);
												$('#grid_wrap').datagrid('deleteRow', index);
												$.get('{$this->toolbar_show['delete']['href']}/id/'+rows[i].{$this->idField},function(data){
													if(data){
															 $.messager.show({
																	title:'".Yii::t("easyui", "Operation Result")."',
																	msg:data==1?'".Yii::t("easyui", "delete success")."':'".Yii::t("easyui", "delete faile")."',
																	showType:'show'
																});
													}
												});
											}
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
                        $toolbars[]=array('id'=>'btnpencil','text'=>(isset($this->toolbar_show['multiple']['text'])?$this->toolbar_show['multiple']['text']:Yii::t('easyui', 'Multiple')),'iconCls'=>'icon-edit','handler'=>'function(){multipleRow()}');
                        echo CHtml::openTag('div',array('id'=>'multiple_window','style'=>'display:none;'))."\n";
			$model=new $this->model;
                        $this->widget('application.components.EasyuiGridViews.GridMultiple',array('model'=>$model,'columns'=>$this->columns,'href'=>$this->toolbar_show['multiple']['href'],'formConfig'=>$this->toolbar_show['multiple']['formTpl']));
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
		 return CJavaScript::jsonEncode($toolbars);
	}
	
	public function initColumns(){
		return CJavaScript::jsonEncode($this->columns);
	}
	
	public function initOperations(){
		$this->cs->registerScript('operationRow',"
			function operationRow(row_id){
				buttons='<div id=\"Operation_'+row_id+'\">';			
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
						$('#operation_window').show().window({ 
							title: '".Yii::t("easyui", "Edit")."',
							content:'<iframe name=\"editFrame\"  src=\"{$this->toolbar_show['edit']['href']}/id/'+row_id+'\" marginheight=0 marginwidth=0  scrolling=\"none\" framespacing=0 frameborder=0 width=\"100%\" height=\"99%\"></iframe>',
                                                        width:700,  
                                                        height:500,
                                                        closable:true, 
                                                        doSize:true, 
                                                        modal:true,
                                                        onClose:function(){
                                                        $('#grid_wrap').datagrid('reload');
							//	window.location.reload();
							}
						}); 
			}
			function viewRow(row_id){
						$('#operation_window').show().window({ 
							title: '".Yii::t("easyui", "View")."',
							href:'{$this->toolbar_show['view']['href']}/id/'+row_id,
                                                        width:700,  
                                                        height:500,
                                                        closable:true, 
                                                        doSize:true, 
                                                        modal:true,
                                                        onClose:function(){
							//	window.location.reload();
							}
						}); 
			}
		",CClientScript::POS_END);
	}
	
}