<div id='easyload'>original</div>
<div id='easyload1'>original1</div>
<input type='button' id='easyuibtn' value='easyload'/>
<?php
echo CHtml::tag('table',array('id'=>'grid_wrap'),'',true);
Yii::app()->clientScript->registerScript('easyloadframe',"
    $('#easyuibtn').click(function(){
        $.get('/backend/webshop/goods/create',function(data){
            $('#easyload').html(data);
        });
        $.get('/backend/webshop/goods/update/id/73234',function(data){
            $('#easyload1').html(data);
        });
    });
");
?>
