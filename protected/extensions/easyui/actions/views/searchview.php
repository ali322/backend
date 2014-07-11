<div class="s_form_wrapper">
<?php
echo $form->renderBegin();

foreach($form->getElements() as $element)
    echo '<div class="row">'.$element->render().'</div>';
echo $form->renderButtons();

echo $form->renderEnd();
?>
</div>
<?php
Yii::app()->getClientScript()->registerScript("SearchView","
                                       /*checkbox process*/
                                       $('.check_row').val(0);
                                        $('.check_row').click(function(){
                                            if($(this).attr('checked') == true)
                                                $(this).val(1);
                                            else
                                                $(this).val(0);
                                        })
                                        /*checkbox process*/
					$('#search_form_button').click(function(){
							function _initParams(){
								var queryParams={};
								$.each($('.s_row'),function(i,n){
                                                                        if($(this).val() !='')
									     queryParams[$(this).attr('name')]=$(this).val();
								})
									queryParams['search_form']=true;
									return queryParams;
							}
						/*	using(['datagrid','window'],function(){*/
									$('#grid_wrap').datagrid({
										queryParams:_initParams(),
                                                                                onLoadSuccess:function(data){
											$('#search_window').window('close');
										},
                                                                                onLoadError:function(data){
                                                                                        using('messager',function(){
                                                                                                $.messager.alert('".Yii::t('easyui', 'Warning')."','".Yii::t('easyui', 'remote data error')."','warning');
                                                                                        });
                                                                                }
								         });	
						/*         });*/
			                })
		");

?>
