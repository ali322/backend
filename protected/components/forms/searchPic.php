<?php
return array(
    'action'=>Yii::app()->createUrl('pic/loadData'),
    'elements'=>array(
        'pic_name'=>array(
            'type'=>'text',
            'maxlength'=>12,
            'class'=>'s_row',
        ),
        'pic_desc'=>array(
            'type'=>'text',
            'maxlength'=>12,
            'class'=>'s_row',
        ),
    ),
    
    'buttons'=>array(
        'login'=>array(
            'type'=>'button',
            'label'=>Yii::t('easyui','Search'),
            'id'=>'search_form_button',
        )
    )
);
?>