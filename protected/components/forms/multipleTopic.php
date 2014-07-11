<?php
return array(
    'action'=>Yii::app()->createUrl('topic/updateBatch'),
    'elements'=>array(
        'brand_id'=>array(
            'type'=>'dropdownlist',
            'items'=>CHtml::listData(Brand::model()->findAll(), 'brand_id', 'brand_name'),
            'class'=>'m_row',
            'style'=>'max-width:160px;',
            'empty'=>'',
       ),
       'discount'=>array(
           'type'=>'text',
           'class'=>'m_row',
       ),
       'begin_time'=>array(
           'type'=>'text',
           'class'=>'m_row',
       ),
       'end_time'=>array(
           'type'=>'text',
           'class'=>'m_row',
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
