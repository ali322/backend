<?php
return array(
    'action'=>Yii::app()->createUrl('webshop/order/loadData'),
    'elements'=>array(
        'order_sn'=>array(
            'type'=>'text',
            'maxlength'=>12,
            'class'=>'s_row',
        ),
        'user_id'=>array(
            'type'=>'text',
            'maxlength'=>12,
            'class'=>'s_row',
        ),
        'pay_name'=>array(
            'type'=>'text',
            'maxlength'=>12,
            'class'=>'s_row',
        ),
        'ship_name'=>array(
            'type'=>'text',
            'maxlength'=>12,
            'class'=>'s_row',
        ),
       'add_time'=>array(
            'type'=>'text',
            'maxlength'=>12,
            'class'=>'s_row',
        ),
       'order_status'=>array(
           'type'=>'checkbox',
           'class'=>'s_row check_row',
       ),
       'pay_status'=>array(
           'type'=>'checkbox',
           'class'=>'s_row check_row',
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