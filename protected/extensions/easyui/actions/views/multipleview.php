<?php
echo '<div class="s_form_wrapper">';
echo $form->renderBegin();

foreach($form->getElements() as $element)
    echo '<div class="row">'.$element->render().'</div>';
echo $form->renderButtons();

echo $form->renderEnd();
echo '</div>';
?>
<?php
Yii::app()->getClientScript()->registerScript("MultipleView","
                                                      /*checkbox process*/
                                                      $('.check_row').val(0);
                                                      $('.check_row').click(function(){
                                                          if($(this).attr('checked') == true)
                                                            $(this).val(1);
                                                          else
                                                            $(this).val(0);
                                                        })
                                                        /*checkbox process*/
					$('#multiple_form_button').click(function(){
							function _initParams(){
								var queryParams={};
								$.each($('.m_row'),function(i,n){
                                                                        if($(this).val() !='')
                                                                            queryParams[$(this).attr('name')]=$(this).val();
								})
									queryParams['multiple_form']=true;
									return queryParams;
							}
                                                        if($('#batch_id').val() == ''){
                                                                $.messager.alert('".Yii::t('easyui', 'Warning')."','".Yii::t('easyui', 'no rows selected')."','warning');
                                                        }else{
                                                                $.messager.confirm('".Yii::t("easyui", "UpdateBatch")."', '".Yii::t("easyui", "Are you confirm updateBatch them?")."', function(r){
                                                                    if (r){
                                                                        $.ajax({
                                                                             type:'POST',
                                                                             url:'".$href."',
                                                                             data:_initParams(),
                                                                             dataType:'json',
                                                                             success:function(data){
                                                                               if(data.status==true){
                                                                                 $('#multiple_window').window('close');
                                                                               }else{
                                                                                      $.messager.alert('".Yii::t('easyui', 'Warning')."','".Yii::t('easyui', 'no rows updateed')."','warning');
                                                                               }
                                                                              }
                                                                         });
                                                                  }});
                                                        }
			                })
		");

?>
