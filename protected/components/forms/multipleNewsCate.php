<?php
return array(
    'action'=>Yii::app()->createUrl('newscate/updateBatch'),
    'elements'=>array(
       'sort_order'=>array(
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
