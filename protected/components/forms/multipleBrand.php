<?php
return array(
    'action'=>Yii::app()->createUrl('brand/updateBatch'),
    'elements'=>array(
        'cat_id'=>array(
            'type'=>'dropdownlist',
            'items'=>CHtml::listData(Cate::model()->findAll(), 'cat_id', 'cat_name'),
            'class'=>'m_row',
            'style'=>'max-width:160px;',
            'empty'=>'',
       ),
       'in_shop'=>array(
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
