<?php
return array(
    'action'=>Yii::app()->createUrl('news/updateBatch'),
    'elements'=>array(
        'cat_id'=>array(
            'type'=>'dropdownlist',
            'items'=>CHtml::listData(NewsCate::model()->findAll(), 'cat_id', 'cat_name'),
            'class'=>'m_row',
            'style'=>'max-width:160px;',
            'empty'=>'',
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

