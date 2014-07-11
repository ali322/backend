<?php
return array(
    'action'=>Yii::app()->createUrl('webshop/order/updateBatch'),
    'elements'=>array(
       'order_status'=>array(
           'type'=>'checkbox',
           'class'=>'m_row check_row',
       ),
       'pay_status'=>array(
           'type'=>'checkbox',
           'class'=>'m_row check_row',
       ),
        CHtml::hiddenField('batch_id','',array('class'=>'m_row')),
    ),
    
    'buttons'=>array(
        'login'=>array(
            'type'=>'button',
            'label'=>Yii::t('easyui','Save'),
            'id'=>'multiple_form_button',
        )
    )
);
?>
