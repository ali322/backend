<?php
echo CHtml::beginForm($href);
		echo '<div class="s_form_wrapper">';
		foreach ($columns as $row){
                                if(isset($row['search']) && $row['search']){
                                    if($row['field']=='cat_id'){
                                            echo '<div class="row">';
                                            echo CHtml::activeLabel($model,$row['field']);
                                            $this->widget('ext.easyui.EasyuiCombotree',array(
                                                'url'=>Yii::app()->createUrl('webshop/goodsCate/remoteData'),
                                                'model'=>$model,
                                                'attribute'=>'cat_id',
                                                's_class'=>'s_row',
                                                'w_id'=>'multiple_view_ct',
                                            ));
                                            echo '</div>';
                                    }elseif($row['field']=='brand_id'){
                                            echo '<div class="row">';
                                            echo CHtml::activeLabel($model,$row['field']);
                                            echo CHtml::activeDropDownList($model,$row['field'],CHtml::listData(Brand::model()->findAll('in_shop =1'), 'brand_id', 'brand_name'),array('class'=>'s_row','style'=>'max-width:160px;','empty'=>''));
                                            echo '</div>';
                                    }else{
                                            echo '<div class="row">';
                                            echo CHtml::activeLabel($model,$row['field']);
                                            echo CHtml::activeTextField($model,$row['field'],array('class'=>'s_row','size'=>10,'maxlength'=>10,'style'=>'float:left;height:16px;line-height:16px;'));
                                            echo '</div>';
                                    }
                                }
		}
		echo CHtml::button(Yii::t('easyui','Multiple'),array('id'=>'multiple_form_button','style'=>'text-align:center'));
		echo CHtml::hiddenField('batch_id','',array('id'=>'batch_id'));
		echo CHtml::endForm();
                
                echo '</div>';
?>
<?php
Yii::app()->getClientScript()->registerScript("MultipleView","
					$('#multiple_form_button').click(function(){
							function _initParams(){
								var queryParams={};
								$.each($('.s_row'),function(i,n){
									queryParams[$(this).attr('name')]=$(this).val();
								})
									queryParams['multiple_form']=true;
									return queryParams;
							}
							using(['datagrid','window'],function(){
									$('#grid_wrap').datagrid({
										queryParams:_initParams(),
                                                                                onLoadSuccess:function(data){
											$('#multiple_window').window('close');
										},
                                                                                onLoadError:function(data){
                                                                                        alert('".Yii::t("easyui", "remote data error")."');
                                                                                }
								});	
						});
			})
		");

Yii::app()->clientScript->registerCss('gridMultiple',"
.s_form_wrapper{padding:6px;}
.s_form_wrapper .row{clear:both;height:26px;line-height:26px;}
.s_form_wrapper .row label{float:left;width:100px;height:26px;line-height:26px;}
");
?>
